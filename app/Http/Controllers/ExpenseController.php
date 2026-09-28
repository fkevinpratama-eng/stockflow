<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $expenses = Expense::query()
            ->with('user')
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('expense_number', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('category', 'like', '%' . $search . '%');
                });
            })
            ->latest('expense_date')
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('expenses.index', compact(
            'expenses',
            'search'
        ));
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'expense_number' => [
                'required',
                'string',
                'max:100',
                'unique:expenses,expense_number',
            ],

            'expense_date' => [
                'required',
                'date',
            ],

            'category' => [
                'required',
                'string',
                'max:100',
            ],

            'description' => [
                'required',
                'string',
                'max:255',
            ],

            'amount' => [
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
        ], [
            'expense_number.required' => 'Nomor pengeluaran wajib diisi.',
            'expense_number.unique' => 'Nomor pengeluaran sudah digunakan.',
            'expense_date.required' => 'Tanggal pengeluaran wajib diisi.',
            'expense_date.date' => 'Format tanggal tidak valid.',
            'category.required' => 'Kategori pengeluaran wajib dipilih.',
            'description.required' => 'Deskripsi pengeluaran wajib diisi.',
            'amount.required' => 'Jumlah pengeluaran wajib diisi.',
            'amount.numeric' => 'Jumlah pengeluaran harus berupa angka.',
            'amount.min' => 'Jumlah pengeluaran tidak boleh kurang dari 0.',
            'payment_method.required' => 'Metode pembayaran wajib dipilih.',
            'payment_method.in' => 'Metode pembayaran tidak valid.',
            'notes.max' => 'Catatan maksimal 1000 karakter.',
        ]);

        Expense::create([
            'user_id' => auth()->id(),
            'expense_number' => $validated['expense_number'],
            'expense_date' => $validated['expense_date'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()
            ->route('expenses.index')
            ->with(
                'success',
                'Pengeluaran berhasil disimpan.'
            );
    }

    public function show(Expense $expense)
    {
        $expense->load('user');

        return view('expenses.show', compact('expense'));
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()
            ->route('expenses.index')
            ->with(
                'success',
                'Pengeluaran berhasil dihapus.'
            );
    }
}