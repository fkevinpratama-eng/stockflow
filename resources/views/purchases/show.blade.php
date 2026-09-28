<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Detail Pembelian - StockFlow</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >


    <style>

        :root {
            --orange: #ff6600;
            --orange-dark: #e85d00;
            --orange-soft: #fff3eb;
            --text-dark: #252525;
            --border: #e8e8e8;
        }


        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;
            background: #f7f8fa;
            color: var(--text-dark);
            font-family: Arial, sans-serif;
        }


        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            height: 70px;
            background: #ffffff;
            border-bottom: 1px solid var(--border);

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 30px;

            position: sticky;
            top: 0;

            z-index: 1000;
        }


        .brand {
            display: flex;
            align-items: center;

            gap: 10px;

            font-size: 21px;
            font-weight: 700;

            color: var(--orange);
        }


        .brand-icon {
            width: 38px;
            height: 38px;

            background: var(--orange);
            color: #ffffff;

            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 18px;
        }


        .user-area {
            display: flex;
            align-items: center;

            gap: 15px;
        }


        .user-info {
            text-align: right;
        }


        .user-name {
            font-size: 14px;
            font-weight: 700;
        }


        .user-role {
            font-size: 12px;
            color: #888888;

            text-transform: capitalize;
        }


        .avatar {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            background: var(--orange-soft);
            color: var(--orange);

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: 700;
        }


        .logout-btn {
            border: 0;
            background: transparent;

            color: #777777;

            font-size: 18px;

            cursor: pointer;
        }


        .logout-btn:hover {
            color: #dc3545;
        }


        /* =========================
           PAGE
        ========================= */

        .page-wrapper {
            max-width: 1200px;

            margin: 0 auto;

            padding: 30px;
        }


        .back-link {
            display: inline-flex;
            align-items: center;

            gap: 7px;

            color: #777777;

            text-decoration: none;

            font-size: 14px;

            margin-bottom: 15px;
        }


        .back-link:hover {
            color: var(--orange);
        }


        .page-header {
            display: flex;

            justify-content: space-between;
            align-items: flex-end;

            gap: 20px;

            margin-bottom: 25px;
        }


        .page-title {
            margin: 0;

            font-size: 27px;

            font-weight: 700;
        }


        .page-subtitle {
            margin-top: 6px;

            color: #888888;

            font-size: 14px;
        }


        /* =========================
           BUTTON
        ========================= */

        .btn-orange {
            background: var(--orange);

            border-color: var(--orange);

            color: #ffffff;

            font-weight: 600;

            border-radius: 9px;

            padding: 10px 17px;
        }


        .btn-orange:hover {
            background: var(--orange-dark);

            border-color: var(--orange-dark);

            color: #ffffff;
        }


        /* =========================
           CARD
        ========================= */

        .card-custom {
            background: #ffffff;

            border: 1px solid var(--border);

            border-radius: 15px;

            box-shadow:
                0 4px 18px rgba(0, 0, 0, 0.03);

            margin-bottom: 20px;

            overflow: hidden;
        }


        .card-header-custom {
            padding: 20px 22px;

            border-bottom: 1px solid var(--border);

            display: flex;
            align-items: center;

            justify-content: space-between;

            gap: 15px;
        }


        .card-title {
            margin: 0;

            font-size: 16px;

            font-weight: 700;
        }


        .card-body-custom {
            padding: 22px;
        }


        /* =========================
           INFO
        ========================= */

        .info-label {
            color: #888888;

            font-size: 12px;

            margin-bottom: 5px;
        }


        .info-value {
            font-size: 14px;

            font-weight: 600;
        }


        .invoice-number {
            color: var(--orange);

            font-size: 18px;

            font-weight: 700;
        }


        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            overflow-x: auto;
        }


        .purchase-table {
            width: 100%;

            margin: 0;
        }


        .purchase-table th {
            background: #fafafa;

            padding: 14px 16px;

            border-bottom: 1px solid var(--border);

            color: #777777;

            font-size: 12px;

            text-transform: uppercase;

            white-space: nowrap;
        }


        .purchase-table td {
            padding: 15px 16px;

            border-bottom: 1px solid #f0f0f0;

            vertical-align: middle;
        }


        .product-name {
            font-weight: 600;
        }


        .product-sku {
            font-size: 12px;

            color: #888888;

            margin-top: 3px;
        }


        .quantity-badge {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-width: 35px;

            padding: 5px 9px;

            background: var(--orange-soft);

            color: var(--orange);

            border-radius: 7px;

            font-size: 13px;

            font-weight: 700;
        }


        .money {
            white-space: nowrap;

            font-weight: 600;
        }


        /* =========================
           TOTAL
        ========================= */

        .total-section {
            display: flex;

            justify-content: flex-end;
        }


        .total-box {
            width: 350px;

            background: var(--orange-soft);

            border-radius: 12px;

            padding: 20px;
        }


        .total-label {
            color: #777777;

            font-size: 13px;

            margin-bottom: 5px;
        }


        .total-value {
            color: var(--orange);

            font-size: 27px;

            font-weight: 800;
        }


        /* =========================
           NOTES
        ========================= */

        .notes-box {
            background: #fafafa;

            border-radius: 10px;

            padding: 15px;

            color: #666666;

            font-size: 14px;

            white-space: pre-line;
        }


        /* =========================
           PRINT
        ========================= */

        @media print {

            .topbar,
            .back-link,
            .header-actions {
                display: none !important;
            }


            body {
                background: #ffffff;
            }


            .page-wrapper {
                max-width: none;

                padding: 0;
            }


            .card-custom {
                box-shadow: none;

                border: 1px solid #dddddd;
            }

        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 768px) {

            .topbar {
                padding: 0 15px;
            }


            .user-info {
                display: none;
            }


            .page-wrapper {
                padding: 20px 15px;
            }


            .page-header {
                align-items: flex-start;

                flex-direction: column;
            }


            .page-title {
                font-size: 23px;
            }


            .total-box {
                width: 100%;
            }

        }

    </style>

</head>


<body>


<!-- =========================
     TOPBAR
========================= -->

<header class="topbar">


    <div class="brand">

        <div class="brand-icon">

            <i class="bi bi-box-seam"></i>

        </div>

        StockFlow

    </div>


    <div class="user-area">


        <div class="user-info">

            <div class="user-name">

                {{ auth()->user()->name }}

            </div>


            <div class="user-role">

                {{ auth()->user()->role }}

            </div>

        </div>


        <div class="avatar">

            {{ strtoupper(
                substr(auth()->user()->name, 0, 1)
            ) }}

        </div>


        <form
            action="{{ route('logout') }}"
            method="POST"
        >

            @csrf

            <button
                type="submit"
                class="logout-btn"
                title="Logout"
            >

                <i class="bi bi-box-arrow-right"></i>

            </button>

        </form>


    </div>

</header>


<!-- =========================
     CONTENT
========================= -->

<main class="page-wrapper">


    <!-- BACK -->

    <a
        href="{{ route('purchases.index') }}"
        class="back-link"
    >

        <i class="bi bi-arrow-left"></i>

        Kembali ke Pembelian

    </a>


    <!-- =========================
         HEADER
    ========================= -->

    <div class="page-header">


        <div>

            <h1 class="page-title">

                Detail Pembelian

            </h1>


            <div class="page-subtitle">

                Informasi lengkap transaksi pembelian.

            </div>

        </div>


        <div class="header-actions">

            <button
                type="button"
                class="btn btn-orange"
                onclick="window.print()"
            >

                <i class="bi bi-printer me-2"></i>

                Cetak

            </button>

        </div>


    </div>


    <!-- =========================
         INFORMASI PEMBELIAN
    ========================= -->

    <div class="card-custom">


        <div class="card-header-custom">


            <h5 class="card-title">

                <i class="bi bi-receipt me-2 text-warning"></i>

                Informasi Pembelian

            </h5>


        </div>


        <div class="card-body-custom">


            <div class="row g-4">


                <!-- INVOICE -->

                <div class="col-md-3">

                    <div class="info-label">

                        Nomor Invoice

                    </div>


                    <div class="invoice-number">

                        {{ $purchase->invoice_number }}

                    </div>

                </div>


                <!-- SUPPLIER -->

                <div class="col-md-3">

                    <div class="info-label">

                        Supplier

                    </div>


                    <div class="info-value">

                        {{ $purchase->supplier->name }}

                    </div>


                    <div class="small text-muted">

                        {{ $purchase->supplier->code }}

                    </div>

                </div>


                <!-- TANGGAL -->

                <div class="col-md-3">

                    <div class="info-label">

                        Tanggal Pembelian

                    </div>


                    <div class="info-value">

                        {{ $purchase->purchase_date->format('d M Y') }}

                    </div>

                </div>


                <!-- TOTAL -->

                <div class="col-md-3">

                    <div class="info-label">

                        Total Pembelian

                    </div>


                    <div class="info-value text-warning">

                        Rp {{ number_format(
                            $purchase->total_amount,
                            0,
                            ',',
                            '.'
                        ) }}

                    </div>

                </div>


            </div>


        </div>

    </div>


    <!-- =========================
         PRODUK
    ========================= -->

    <div class="card-custom">


        <div class="card-header-custom">


            <h5 class="card-title">

                <i class="bi bi-boxes me-2 text-warning"></i>

                Produk yang Dibeli

            </h5>


            <span class="text-muted small">

                {{ $purchase->items->count() }}
                produk

            </span>


        </div>


        <div class="table-wrapper">


            <table class="purchase-table">


                <thead>

                    <tr>

                        <th width="50">
                            #
                        </th>

                        <th>
                            Produk
                        </th>

                        <th>
                            Qty
                        </th>

                        <th>
                            Harga Beli
                        </th>

                        <th>
                            Subtotal
                        </th>

                    </tr>

                </thead>


                <tbody>


                    @foreach($purchase->items as $index => $item)


                        <tr>


                            <!-- NO -->

                            <td>

                                {{ $index + 1 }}

                            </td>


                            <!-- PRODUK -->

                            <td>

                                <div class="product-name">

                                    {{ $item->product->name }}

                                </div>


                                <div class="product-sku">

                                    SKU:
                                    {{ $item->product->sku }}

                                </div>

                            </td>


                            <!-- QTY -->

                            <td>

                                <span class="quantity-badge">

                                    {{ $item->quantity }}

                                </span>


                                <span class="text-muted small ms-1">

                                    {{ $item->product->unit }}

                                </span>

                            </td>


                            <!-- HARGA -->

                            <td class="money">

                                Rp {{ number_format(
                                    $item->purchase_price,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>


                            <!-- SUBTOTAL -->

                            <td class="money">

                                Rp {{ number_format(
                                    $item->subtotal,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>


                        </tr>


                    @endforeach


                </tbody>


            </table>


        </div>


        <!-- TOTAL -->

        <div class="card-body-custom">


            <div class="total-section">


                <div class="total-box">


                    <div class="total-label">

                        Total Pembelian

                    </div>


                    <div class="total-value">

                        Rp {{ number_format(
                            $purchase->total_amount,
                            0,
                            ',',
                            '.'
                        ) }}

                    </div>


                </div>


            </div>


        </div>


    </div>


    <!-- =========================
         CATATAN
    ========================= -->

    @if($purchase->notes)


        <div class="card-custom">


            <div class="card-header-custom">


                <h5 class="card-title">

                    <i class="bi bi-sticky me-2 text-warning"></i>

                    Catatan

                </h5>


            </div>


            <div class="card-body-custom">


                <div class="notes-box">

                    {{ $purchase->notes }}

                </div>


            </div>


        </div>


    @endif


</main>


</body>

</html>