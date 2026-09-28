<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pengeluaran - StockFlow</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --orange: #ff6600;
            --orange-dark: #e85d00;
            --bg: #f7f8fa;
            --border: #e9ecef;
            --muted: #6c757d;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: #212529;
            font-family: Arial, Helvetica, sans-serif;
        }

        .topbar {
            height: 64px;
            background: #fff;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--orange);
            font-size: 21px;
            font-weight: 700;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: var(--orange);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #fff1e8;
            color: var(--orange);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .user-info {
            line-height: 1.2;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
        }

        .user-role {
            font-size: 12px;
            color: var(--muted);
            text-transform: capitalize;
        }

        .logout-btn {
            border: none;
            background: transparent;
            color: #6c757d;
            font-size: 18px;
        }

        .logout-btn:hover {
            color: #dc3545;
        }

        .main-content {
            max-width: 1000px;
            margin: auto;
            padding: 30px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--muted);
            text-decoration: none;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .back-link:hover {
            color: var(--orange);
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 22px;
        }

        .page-title {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }

        .page-subtitle {
            color: var(--muted);
            font-size: 14px;
            margin: 6px 0 0;
        }

        .print-btn {
            border: 1px solid var(--orange);
            background: white;
            color: var(--orange);
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .print-btn:hover {
            background: var(--orange);
            color: white;
        }

        .card-box {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
        }

        .invoice-header {
            padding: 25px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
        }

        .company-name {
            color: var(--orange);
            font-size: 20px;
            font-weight: 700;
        }

        .company-label {
            color: var(--muted);
            font-size: 12px;
            margin-top: 3px;
        }

        .expense-number {
            font-size: 18px;
            font-weight: 700;
        }

        .expense-label {
            color: var(--muted);
            font-size: 11px;
            text-transform: uppercase;
            margin-bottom: 3px;
        }

        .info-section {
            padding: 22px 25px;
            border-bottom: 1px solid var(--border);
        }

        .section-title {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .info-label {
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 14px;
            font-weight: 600;
        }

        .category-badge {
            display: inline-block;
            background: #fff1e8;
            color: var(--orange);
            padding: 6px 10px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 600;
        }

        .payment-badge {
            display: inline-block;
            background: #f1f3f5;
            color: #495057;
            padding: 6px 10px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .amount-section {
            padding: 25px;
            background: #fffaf7;
        }

        .amount-label {
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 5px;
        }

        .amount-value {
            color: var(--orange);
            font-size: 28px;
            font-weight: 700;
        }

        .notes-section {
            padding: 22px 25px;
            border-top: 1px solid var(--border);
        }

        .notes-box {
            background: #f8f9fa;
            border-radius: 9px;
            padding: 13px 15px;
            font-size: 13px;
            color: #495057;
            white-space: pre-line;
        }

        .footer-info {
            padding: 17px 25px;
            color: var(--muted);
            font-size: 11px;
            border-top: 1px solid var(--border);
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 18px;
        }

        .delete-btn {
            border: 1px solid #dc3545;
            background: white;
            color: #dc3545;
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 13px;
            font-weight: 600;
        }

        .delete-btn:hover {
            background: #dc3545;
            color: white;
        }

        @media (max-width: 768px) {
            .topbar {
                padding: 0 15px;
            }

            .user-info {
                display: none;
            }

            .main-content {
                padding: 20px 15px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .print-btn {
                width: 100%;
                justify-content: center;
            }

            .invoice-header {
                flex-direction: column;
            }

            .actions {
                flex-direction: column;
            }

            .actions a,
            .actions button {
                width: 100%;
            }
        }

        @media print {
            body {
                background: white;
            }

            .topbar,
            .back-link,
            .page-header .print-btn,
            .actions {
                display: none !important;
            }

            .main-content {
                max-width: none;
                padding: 0;
            }

            .card-box {
                border: none;
                border-radius: 0;
            }
        }
    </style>
</head>

<body>

    <!-- TOPBAR -->
    <div class="topbar">

        <div class="brand">
            <div class="brand-icon">
                <i class="bi bi-box-seam"></i>
            </div>

            StockFlow
        </div>

        <div class="user-area">

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div class="user-info">

                <div class="user-name">
                    {{ auth()->user()->name }}
                </div>

                <div class="user-role">
                    {{ auth()->user()->role }}
                </div>

            </div>

            <form action="{{ route('logout') }}" method="POST">

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

    </div>


    <main class="main-content">

        <a
            href="{{ route('expenses.index') }}"
            class="back-link"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali ke Pengeluaran
        </a>


        <div class="page-header">

            <div>

                <h1 class="page-title">
                    Detail Pengeluaran
                </h1>

                <p class="page-subtitle">
                    Informasi lengkap transaksi pengeluaran.
                </p>

            </div>

            <button
                type="button"
                class="print-btn"
                onclick="window.print()"
            >
                <i class="bi bi-printer"></i>
                Cetak
            </button>

        </div>


        <div class="card-box">

            <!-- HEADER -->
            <div class="invoice-header">

                <div>

                    <div class="company-name">
                        StockFlow
                    </div>

                    <div class="company-label">
                        Sistem Manajemen Bisnis
                    </div>

                </div>

                <div class="text-md-end">

                    <div class="expense-label">
                        Nomor Pengeluaran
                    </div>

                    <div class="expense-number">
                        {{ $expense->expense_number }}
                    </div>

                </div>

            </div>


            <!-- INFORMATION -->
            <div class="info-section">

                <div class="section-title">
                    Informasi Transaksi
                </div>

                <div class="row g-4">

                    <div class="col-6 col-md-3">

                        <div class="info-label">
                            Tanggal
                        </div>

                        <div class="info-value">
                            {{ $expense->expense_date->format('d/m/Y') }}
                        </div>

                    </div>


                    <div class="col-6 col-md-3">

                        <div class="info-label">
                            Kategori
                        </div>

                        <div class="info-value">
                            <span class="category-badge">
                                {{ $expense->category }}
                            </span>
                        </div>

                    </div>


                    <div class="col-6 col-md-3">

                        <div class="info-label">
                            Metode Pembayaran
                        </div>

                        <div class="info-value">
                            <span class="payment-badge">
                                {{ $expense->payment_method }}
                            </span>
                        </div>

                    </div>


                    <div class="col-6 col-md-3">

                        <div class="info-label">
                            Input Oleh
                        </div>

                        <div class="info-value">
                            {{ $expense->user->name ?? '-' }}
                        </div>

                    </div>


                    <div class="col-12">

                        <div class="info-label">
                            Deskripsi
                        </div>

                        <div class="info-value">
                            {{ $expense->description }}
                        </div>

                    </div>

                </div>

            </div>


            <!-- AMOUNT -->
            <div class="amount-section">

                <div class="amount-label">
                    Total Pengeluaran
                </div>

                <div class="amount-value">
                    Rp {{ number_format($expense->amount, 0, ',', '.') }}
                </div>

            </div>


            <!-- NOTES -->
            @if($expense->notes)

                <div class="notes-section">

                    <div class="section-title">
                        Catatan
                    </div>

                    <div class="notes-box">
                        {{ $expense->notes }}
                    </div>

                </div>

            @endif


            <!-- FOOTER -->
            <div class="footer-info">

                Dibuat pada
                {{ $expense->created_at->format('d/m/Y H:i') }}

                @if($expense->updated_at != $expense->created_at)
                    · Diperbarui pada
                    {{ $expense->updated_at->format('d/m/Y H:i') }}
                @endif

            </div>

        </div>


        <!-- ACTIONS -->
        <div class="actions">

            <form
                action="{{ route('expenses.destroy', $expense) }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin menghapus pengeluaran ini?')"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="delete-btn"
                >
                    <i class="bi bi-trash me-1"></i>
                    Hapus Pengeluaran
                </button>

            </form>

        </div>

    </main>

</body>
</html>