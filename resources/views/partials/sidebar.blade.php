<aside class="sidebar">

    <div class="sidebar-brand">
        <div class="brand-icon">
            <i class="bi bi-box-seam-fill"></i>
        </div>

        <div>
            <div class="brand-name">StockFlow</div>
            <div class="brand-subtitle">Inventory System</div>
        </div>
    </div>

    <div class="sidebar-menu">

        <a href="{{ route('dashboard') }}"
           class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Dashboard</span>
        </a>


        <div class="sidebar-section">
            <div class="sidebar-title">MASTER DATA</div>

            <a href="{{ route('categories.index') }}"
               class="sidebar-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <i class="bi bi-tags-fill"></i>
                <span>Kategori</span>
            </a>

            <a href="{{ route('products.index') }}"
               class="sidebar-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                <i class="bi bi-box-seam-fill"></i>
                <span>Produk</span>
            </a>

            <a href="{{ route('suppliers.index') }}"
               class="sidebar-link {{ request()->routeIs('suppliers.*') ? 'active' : '' }}">
                <i class="bi bi-truck"></i>
                <span>Supplier</span>
            </a>
        </div>


        <div class="sidebar-section">
            <div class="sidebar-title">TRANSAKSI</div>

            <a href="{{ route('purchases.index') }}"
               class="sidebar-link {{ request()->routeIs('purchases.*') ? 'active' : '' }}">
                <i class="bi bi-cart-plus-fill"></i>
                <span>Pembelian</span>
            </a>

            <a href="{{ route('sales.index') }}"
               class="sidebar-link {{ request()->routeIs('sales.*') ? 'active' : '' }}">
                <i class="bi bi-cart-check-fill"></i>
                <span>Penjualan</span>
            </a>

            <a href="{{ route('expenses.index') }}"
               class="sidebar-link {{ request()->routeIs('expenses.*') ? 'active' : '' }}">
                <i class="bi bi-wallet2"></i>
                <span>Pengeluaran</span>
            </a>
        </div>


        <div class="sidebar-section">
            <div class="sidebar-title">LAPORAN</div>

            <a href="{{ route('reports.sales') }}"
               class="sidebar-link {{ request()->routeIs('reports.sales') ? 'active' : '' }}">
                <i class="bi bi-bar-chart-fill"></i>
                <span>Penjualan</span>
            </a>

            <a href="{{ route('reports.purchases') }}"
               class="sidebar-link {{ request()->routeIs('reports.purchases') ? 'active' : '' }}">
                <i class="bi bi-receipt"></i>
                <span>Pembelian</span>
            </a>

            <a href="{{ route('reports.stock') }}"
               class="sidebar-link {{ request()->routeIs('reports.stock') ? 'active' : '' }}">
                <i class="bi bi-boxes"></i>
                <span>Stok</span>
            </a>

            <a href="{{ route('reports.expenses') }}"
               class="sidebar-link {{ request()->routeIs('reports.expenses') ? 'active' : '' }}">
                <i class="bi bi-cash-stack"></i>
                <span>Pengeluaran</span>
            </a>

            <a href="{{ route('reports.profit-loss') }}"
               class="sidebar-link {{ request()->routeIs('reports.profit-loss') ? 'active' : '' }}">
                <i class="bi bi-graph-up-arrow"></i>
                <span>Laba / Rugi</span>
            </a>
        </div>

    </div>


    <div class="sidebar-footer">

        <div class="user-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>

        <div class="user-detail">
            <div class="user-name">
                {{ auth()->user()->name }}
            </div>

            <div class="user-role">
                {{ ucfirst(auth()->user()->role) }}
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="logout-button" title="Logout">
                <i class="bi bi-box-arrow-right"></i>
            </button>
        </form>

    </div>

</aside>