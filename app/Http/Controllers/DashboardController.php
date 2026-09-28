<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $totalCategories = Category::count();

        $totalStock = Product::sum('stock');

        $todaySales = Sale::whereDate(
            'sale_date',
            today()
        )->count();

        $todayRevenue = Sale::whereDate(
            'sale_date',
            today()
        )->sum('total_amount');

        $lowStockProducts = Product::query()
            ->whereColumn('stock', '<=', 'minimum_stock')
            ->orderBy('stock')
            ->orderBy('name')
            ->limit(10)
            ->get();

        $recentSales = Sale::query()
            ->with('user')
            ->latest('sale_date')
            ->latest('id')
            ->limit(8)
            ->get();

        $salesChart = Sale::query()
            ->select(
                DB::raw('DATE(sale_date) as date'),
                DB::raw('SUM(total_amount) as total')
            )
            ->where(
                'sale_date',
                '>=',
                now()->subDays(6)->startOfDay()
            )
            ->groupBy(
                DB::raw('DATE(sale_date)')
            )
            ->orderBy('date')
            ->get();

        return view('dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalStock',
            'todaySales',
            'todayRevenue',
            'lowStockProducts',
            'recentSales',
            'salesChart'
        ));
    }
}