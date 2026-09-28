<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $purchases = Purchase::query()
            ->with('supplier')
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('invoice_number', 'like', '%' . $search . '%')
                        ->orWhereHas('supplier', function ($supplierQuery) use ($search) {
                            $supplierQuery
                                ->where('name', 'like', '%' . $search . '%')
                                ->orWhere('code', 'like', '%' . $search . '%');
                        });
                });
            })
            ->latest('purchase_date')
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('purchases.index', compact(
            'purchases',
            'search'
        ));
    }

    public function create()
    {
        $suppliers = Supplier::orderBy('name')->get();

        $products = Product::orderBy('name')->get();

        return view('purchases.create', compact(
            'suppliers',
            'products'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_id' => [
                'required',
                'exists:suppliers,id',
            ],

            'invoice_number' => [
                'required',
                'string',
                'max:100',
                'unique:purchases,invoice_number',
            ],

            'purchase_date' => [
                'required',
                'date',
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

            'items.*.purchase_price' => [
                'required',
                'numeric',
                'min:0',
            ],
        ], [
            'supplier_id.required' => 'Supplier wajib dipilih.',
            'supplier_id.exists' => 'Supplier yang dipilih tidak valid.',

            'invoice_number.required' => 'Nomor invoice wajib diisi.',
            'invoice_number.unique' => 'Nomor invoice sudah digunakan.',
            'invoice_number.max' => 'Nomor invoice maksimal 100 karakter.',

            'purchase_date.required' => 'Tanggal pembelian wajib diisi.',
            'purchase_date.date' => 'Format tanggal pembelian tidak valid.',

            'notes.max' => 'Catatan maksimal 1000 karakter.',

            'items.required' => 'Minimal harus ada satu produk.',
            'items.min' => 'Minimal harus ada satu produk.',

            'items.*.product_id.required' => 'Produk wajib dipilih.',
            'items.*.product_id.exists' => 'Produk yang dipilih tidak valid.',

            'items.*.quantity.required' => 'Jumlah produk wajib diisi.',
            'items.*.quantity.integer' => 'Jumlah produk harus berupa angka bulat.',
            'items.*.quantity.min' => 'Jumlah produk minimal 1.',

            'items.*.purchase_price.required' => 'Harga beli wajib diisi.',
            'items.*.purchase_price.numeric' => 'Harga beli harus berupa angka.',
            'items.*.purchase_price.min' => 'Harga beli tidak boleh kurang dari 0.',
        ]);

        $items = $validated['items'];

        $productIds = collect($items)
            ->pluck('product_id');

        if ($productIds->count() !== $productIds->unique()->count()) {
            throw ValidationException::withMessages([
                'items' => 'Produk yang sama tidak boleh dimasukkan lebih dari satu kali. Gabungkan jumlahnya dalam satu baris.',
            ]);
        }

        DB::transaction(function () use ($validated, $items) {

            $totalAmount = 0;

            foreach ($items as $item) {
                $subtotal = $item['quantity'] * $item['purchase_price'];

                $totalAmount += $subtotal;
            }

            $purchase = Purchase::create([
                'supplier_id' => $validated['supplier_id'],
                'invoice_number' => $validated['invoice_number'],
                'purchase_date' => $validated['purchase_date'],
                'total_amount' => $totalAmount,
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($items as $item) {

                $subtotal = $item['quantity'] * $item['purchase_price'];

                $purchase->items()->create([
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'purchase_price' => $item['purchase_price'],
                    'subtotal' => $subtotal,
                ]);

                $product = Product::lockForUpdate()
                    ->findOrFail($item['product_id']);

                $product->increment(
                    'stock',
                    $item['quantity']
                );
            }
        });

        return redirect()
            ->route('purchases.index')
            ->with('success', 'Pembelian berhasil disimpan dan stok produk telah diperbarui.');
    }

    public function show(Purchase $purchase)
    {
        $purchase->load([
            'supplier',
            'items.product',
        ]);

        return view('purchases.show', compact('purchase'));
    }
}