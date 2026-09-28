<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $sales = Sale::query()
            ->with('user')
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('invoice_number', 'like', '%' . $search . '%')
                        ->orWhereHas('user', function ($userQuery) use ($search) {
                            $userQuery->where('name', 'like', '%' . $search . '%');
                        });
                });
            })
            ->latest('sale_date')
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('sales.index', compact(
            'sales',
            'search'
        ));
    }


    public function create()
    {
        $products = Product::query()
            ->where('stock', '>', 0)
            ->orderBy('name')
            ->get();

        return view('sales.create', compact('products'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'invoice_number' => [
                'required',
                'string',
                'max:100',
                'unique:sales,invoice_number',
            ],

            'discount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'paid_amount' => [
                'required',
                'numeric',
                'min:0',
            ],

            'payment_method' => [
                'required',
                'in:cash,transfer,qris,card',
            ],

            'notes' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'items' => [
                'required',
                'array',
                'min:1',
            ],

            'items.*.product_id' => [
                'required',
                'exists:products,id',
            ],

            'items.*.quantity' => [
                'required',
                'integer',
                'min:1',
            ],

            'items.*.selling_price' => [
                'required',
                'numeric',
                'min:0',
            ],
        ], [
            'invoice_number.required' => 'Nomor invoice wajib diisi.',
            'invoice_number.unique' => 'Nomor invoice sudah digunakan.',

            'discount.numeric' => 'Diskon harus berupa angka.',
            'discount.min' => 'Diskon tidak boleh kurang dari 0.',

            'paid_amount.required' => 'Jumlah pembayaran wajib diisi.',
            'paid_amount.numeric' => 'Jumlah pembayaran harus berupa angka.',
            'paid_amount.min' => 'Jumlah pembayaran tidak boleh kurang dari 0.',

            'payment_method.required' => 'Metode pembayaran wajib dipilih.',
            'payment_method.in' => 'Metode pembayaran tidak valid.',

            'notes.max' => 'Catatan maksimal 1000 karakter.',

            'items.required' => 'Minimal harus ada satu produk.',
            'items.min' => 'Minimal harus ada satu produk.',
            'items.*.product_id.required' => 'Produk wajib dipilih.',
            'items.*.product_id.exists' => 'Produk tidak valid.',
            'items.*.quantity.required' => 'Jumlah produk wajib diisi.',
            'items.*.quantity.integer' => 'Jumlah produk harus berupa angka bulat.',
            'items.*.quantity.min' => 'Jumlah produk minimal 1.',
            'items.*.selling_price.required' => 'Harga jual wajib diisi.',
            'items.*.selling_price.numeric' => 'Harga jual harus berupa angka.',
        ]);

        $items = $validated['items'];

        // Produk yang sama tidak boleh muncul dua kali
        $productIds = collect($items)->pluck('product_id');

        if ($productIds->count() !== $productIds->unique()->count()) {
            throw ValidationException::withMessages([
                'items' => 'Produk yang sama tidak boleh dimasukkan lebih dari satu kali.',
            ]);
        }

        DB::transaction(function () use ($validated, $items) {

            $subtotal = 0;

            foreach ($items as $item) {
                $subtotal +=
                    $item['quantity'] *
                    $item['selling_price'];
            }

            $discount = $validated['discount'] ?? 0;

            if ($discount > $subtotal) {
                throw ValidationException::withMessages([
                    'discount' => 'Diskon tidak boleh lebih besar dari subtotal.',
                ]);
            }

            $totalAmount = $subtotal - $discount;

            if ($validated['paid_amount'] < $totalAmount) {
                throw ValidationException::withMessages([
                    'paid_amount' => 'Jumlah pembayaran kurang dari total transaksi.',
                ]);
            }

            $changeAmount =
                $validated['paid_amount'] - $totalAmount;

            $sale = Sale::create([
                'user_id' => auth()->id(),
                'invoice_number' => $validated['invoice_number'],
                'sale_date' => now(),
                'subtotal' => $subtotal,
                'discount' => $discount,
                'total_amount' => $totalAmount,
                'paid_amount' => $validated['paid_amount'],
                'change_amount' => $changeAmount,
                'payment_method' => $validated['payment_method'],
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($items as $item) {

                // Kunci produk selama transaksi berlangsung
                $product = Product::lockForUpdate()
                    ->findOrFail($item['product_id']);

                // Pastikan stok masih mencukupi
                if ($item['quantity'] > $product->stock) {
                    throw ValidationException::withMessages([
                        'items' =>
                            "Stok {$product->name} tidak mencukupi. " .
                            "Stok tersedia: {$product->stock}.",
                    ]);
                }

                $itemSubtotal =
                    $item['quantity'] *
                    $item['selling_price'];

                // Simpan harga modal dari database
                $sale->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'selling_price' => $item['selling_price'],
                    'purchase_price' => $product->purchase_price,
                    'subtotal' => $itemSubtotal,
                ]);

                // Kurangi stok
                $product->decrement(
                    'stock',
                    $item['quantity']
                );
            }
        });

        return redirect()
            ->route('sales.index')
            ->with(
                'success',
                'Penjualan berhasil disimpan dan stok telah diperbarui.'
            );
    }


    public function show(Sale $sale)
    {
        $sale->load([
            'user',
            'items.product',
        ]);

        return view('sales.show', compact('sale'));
    }
}