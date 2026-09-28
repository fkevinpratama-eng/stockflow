<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Expense;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Laporan Penjualan
    |--------------------------------------------------------------------------
    */

    public function sales(Request $request)
    {
        $startDate = $request->input(
            'start_date',
            now()->startOfMonth()->format('Y-m-d')
        );

        $endDate = $request->input(
            'end_date',
            now()->format('Y-m-d')
        );

        $sales = Sale::query()
            ->with('user')
            ->whereDate('sale_date', '>=', $startDate)
            ->whereDate('sale_date', '<=', $endDate)
            ->latest('sale_date')
            ->latest('id')
            ->get();

        $totalTransactions = $sales->count();

        $totalSales = $sales->sum('total_amount');

        $totalDiscount = $sales->sum('discount');

        $totalPaid = $sales->sum('paid_amount');

        return view('reports.sales', compact(
            'sales',
            'startDate',
            'endDate',
            'totalTransactions',
            'totalSales',
            'totalDiscount',
            'totalPaid'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Laporan Pengeluaran
    |--------------------------------------------------------------------------
    */

    public function expenses(Request $request)
    {
        $startDate = $request->input(
            'start_date',
            now()->startOfMonth()->format('Y-m-d')
        );

        $endDate = $request->input(
            'end_date',
            now()->format('Y-m-d')
        );

        $expenses = Expense::query()
            ->with('user')
            ->whereDate('expense_date', '>=', $startDate)
            ->whereDate('expense_date', '<=', $endDate)
            ->latest('expense_date')
            ->latest('id')
            ->get();

        $totalTransactions = $expenses->count();

        $totalExpenses = $expenses->sum('amount');

        return view('reports.expenses', compact(
            'expenses',
            'startDate',
            'endDate',
            'totalTransactions',
            'totalExpenses'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Laporan Stok
    |--------------------------------------------------------------------------
    */

    public function stock(Request $request)
    {
        $search = $request->input('search');

        $products = Product::query()
            ->with('category')
            ->when($search, function ($query, $search) {

                $query->where(function ($query) use ($search) {

                    $query->where(
                        'name',
                        'like',
                        '%' . $search . '%'
                    )

                    ->orWhere(
                        'sku',
                        'like',
                        '%' . $search . '%'
                    )

                    ->orWhereHas(
                        'category',
                        function ($categoryQuery) use ($search) {

                            $categoryQuery->where(
                                'name',
                                'like',
                                '%' . $search . '%'
                            );

                        }
                    );

                });

            })
            ->orderBy('name')
            ->get();

        $totalProducts = $products->count();

        $totalStock = $products->sum('stock');

        $lowStock = $products
            ->filter(function ($product) {

                return $product->stock <= $product->minimum_stock;

            })
            ->count();

        $totalStockValue = $products->sum(function ($product) {

            return $product->stock * $product->purchase_price;

        });

        return view('reports.stock', compact(
            'products',
            'search',
            'totalProducts',
            'totalStock',
            'lowStock',
            'totalStockValue'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Laporan Pembelian
    |--------------------------------------------------------------------------
    */

    public function purchases(Request $request)
    {
        $startDate = $request->input(
            'start_date',
            now()->startOfMonth()->format('Y-m-d')
        );

        $endDate = $request->input(
            'end_date',
            now()->format('Y-m-d')
        );

        $purchases = Purchase::query()
            ->with([
                'supplier',
                'items'
            ])
            ->whereDate('purchase_date', '>=', $startDate)
            ->whereDate('purchase_date', '<=', $endDate)
            ->latest('purchase_date')
            ->latest('id')
            ->get();

        $totalTransactions = $purchases->count();

        $totalPurchases = $purchases->sum('total_amount');

        $totalItems = $purchases->sum(function ($purchase) {
            return $purchase->items->sum('quantity');
        });

        return view('reports.purchases', compact(
            'purchases',
            'startDate',
            'endDate',
            'totalTransactions',
            'totalPurchases',
            'totalItems'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Laporan Laba / Rugi
    |--------------------------------------------------------------------------
    */

    public function profitLoss(Request $request)
    {
        $startDate = $request->input(
            'start_date',
            now()->startOfMonth()->format('Y-m-d')
        );

        $endDate = $request->input(
            'end_date',
            now()->format('Y-m-d')
        );

        /*
        |--------------------------------------------------------------------------
        | Penjualan
        |--------------------------------------------------------------------------
        */

        $sales = Sale::query()
            ->with('items')
            ->whereDate('sale_date', '>=', $startDate)
            ->whereDate('sale_date', '<=', $endDate)
            ->get();

        $totalSales = $sales->sum('total_amount');


        /*
        |--------------------------------------------------------------------------
        | HPP / Cost of Goods Sold
        |--------------------------------------------------------------------------
        */

        $totalHpp = 0;

        foreach ($sales as $sale) {

            foreach ($sale->items as $item) {

                $totalHpp +=
                    $item->quantity *
                    $item->purchase_price;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Laba Kotor
        |--------------------------------------------------------------------------
        */

        $grossProfit = $totalSales - $totalHpp;


        /*
        |--------------------------------------------------------------------------
        | Pengeluaran Operasional
        |--------------------------------------------------------------------------
        */

        $expenses = Expense::query()
            ->whereDate('expense_date', '>=', $startDate)
            ->whereDate('expense_date', '<=', $endDate)
            ->get();

        $totalExpenses = $expenses->sum('amount');


        /*
        |--------------------------------------------------------------------------
        | Laba Bersih
        |--------------------------------------------------------------------------
        */

        $netProfit = $grossProfit - $totalExpenses;


        /*
        |--------------------------------------------------------------------------
        | Jumlah Transaksi
        |--------------------------------------------------------------------------
        */

        $totalTransactions = $sales->count();

        return view('reports.profit-loss', compact(
            'startDate',
            'endDate',
            'sales',
            'expenses',
            'totalSales',
            'totalHpp',
            'grossProfit',
            'totalExpenses',
            'netProfit',
            'totalTransactions'
        ));
    }
}