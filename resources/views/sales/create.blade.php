<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Transaksi Penjualan - StockFlow</title>

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
            --orange-dark: #e85b00;
            --light-orange: #fff3eb;
            --border: #e9ecef;
        }

        body {
            background: #f7f8fa;
            font-family: Arial, sans-serif;
            color: #212529;
            margin: 0;
        }

        .topbar {
            height: 64px;
            background: #ffffff;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .brand {
            font-size: 22px;
            font-weight: 700;
            color: var(--orange);
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: var(--light-orange);
            color: var(--orange);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .page-wrapper {
            padding: 28px;
        }

        .page-title {
            font-size: 26px;
            font-weight: 700;
        }

        .page-subtitle {
            color: #6c757d;
            font-size: 14px;
        }

        .card-custom {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
        }

        .card-header-custom {
            padding: 18px 20px;
            border-bottom: 1px solid var(--border);
            font-weight: 700;
        }

        .card-body-custom {
            padding: 20px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            min-height: 44px;
            border-radius: 9px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--orange);
            box-shadow: 0 0 0 0.2rem rgba(255, 102, 0, 0.12);
        }

        .btn-orange {
            background: var(--orange);
            border-color: var(--orange);
            color: #ffffff;
            font-weight: 600;
            border-radius: 9px;
        }

        .btn-orange:hover {
            background: var(--orange-dark);
            border-color: var(--orange-dark);
            color: #ffffff;
        }

        .btn-light-custom {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 9px;
        }

        .btn-light-custom:hover {
            background: #f8f9fa;
            border-color: #d9dde1;
        }

        .product-search {
            position: relative;
        }

        .product-results {
            position: absolute;
            left: 0;
            right: 0;
            top: 100%;
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 10px;
            margin-top: 5px;
            max-height: 280px;
            overflow-y: auto;
            z-index: 100;
            display: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .product-result {
            padding: 12px 14px;
            cursor: pointer;
            border-bottom: 1px solid #f1f1f1;
        }

        .product-result:last-child {
            border-bottom: none;
        }

        .product-result:hover {
            background: var(--light-orange);
        }

        .product-name {
            font-weight: 600;
        }

        .product-meta {
            font-size: 12px;
            color: #6c757d;
            margin-top: 3px;
        }

        .table > :not(caption) > * > * {
            padding: 13px 10px;
            vertical-align: middle;
        }

        .table thead th {
            font-size: 13px;
            color: #6c757d;
            white-space: nowrap;
            background: #fafafa;
        }

        .qty-input {
            width: 90px;
        }

        .summary-box {
            background: #fafafa;
            border-radius: 12px;
            padding: 18px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .summary-row:last-child {
            margin-bottom: 0;
        }

        .summary-total {
            border-top: 1px solid var(--border);
            padding-top: 14px;
            margin-top: 14px;
            font-size: 20px;
            font-weight: 700;
        }

        .total-value {
            color: var(--orange);
        }

        .empty-cart {
            padding: 55px 20px;
            text-align: center;
            color: #6c757d;
        }

        .empty-cart i {
            font-size: 42px;
            color: #ced4da;
        }

        .badge-stock {
            background: var(--light-orange);
            color: var(--orange);
            font-weight: 600;
            padding: 6px 9px;
        }

        .error-box {
            border-radius: 10px;
        }

        @media (max-width: 768px) {

            .topbar {
                padding: 0 15px;
            }

            .page-wrapper {
                padding: 18px 12px;
            }

            .user-name {
                display: none;
            }

            .page-title {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <!-- TOPBAR -->
    <div class="topbar">

        <div class="brand">
            <i class="bi bi-box-seam me-1"></i>
            StockFlow
        </div>

        <div class="user-area">

            <div class="text-end user-name">

                <div class="fw-semibold">
                    {{ auth()->user()->name }}
                </div>

                <small class="text-muted text-capitalize">
                    {{ auth()->user()->role }}
                </small>

            </div>

            <div class="user-avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button
                    type="submit"
                    class="btn btn-sm btn-light-custom"
                    title="Logout"
                >
                    <i class="bi bi-box-arrow-right"></i>
                </button>

            </form>

        </div>

    </div>


    <!-- PAGE -->
    <div class="page-wrapper">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h1 class="page-title mb-1">
                    Transaksi Penjualan
                </h1>

                <div class="page-subtitle">
                    Tambahkan produk ke keranjang dan proses pembayaran.
                </div>

            </div>

            <a
                href="{{ route('sales.index') }}"
                class="btn btn-light-custom"
            >
                <i class="bi bi-clock-history me-1"></i>
                Riwayat Penjualan
            </a>

        </div>


        <!-- FORM -->
        <form
            action="{{ route('sales.store') }}"
            method="POST"
            id="saleForm"
        >

            @csrf

            <div class="row g-4">

                <!-- LEFT -->
                <div class="col-lg-8">

                    <div class="card-custom">

                        <div class="card-header-custom">
                            <i class="bi bi-cart3 me-2"></i>
                            Produk
                        </div>

                        <div class="card-body-custom">

                            @if ($errors->any())

                                <div class="alert alert-danger error-box">

                                    <div class="fw-semibold mb-1">
                                        Transaksi belum dapat disimpan.
                                    </div>

                                    <ul class="mb-0 ps-3">

                                        @foreach ($errors->all() as $error)

                                            <li>
                                                {{ $error }}
                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            @endif


                            <!-- SEARCH + INVOICE -->
                            <div class="row g-3 mb-4">

                                <div class="col-md-8">

                                    <label class="form-label">
                                        Cari Produk
                                    </label>

                                    <div class="product-search">

                                        <input
                                            type="text"
                                            id="productSearch"
                                            class="form-control"
                                            placeholder="Cari nama produk atau SKU..."
                                            autocomplete="off"
                                        >

                                        <div
                                            id="productResults"
                                            class="product-results"
                                        ></div>

                                    </div>

                                </div>


                                <div class="col-md-4">

                                    <label class="form-label">
                                        Invoice
                                    </label>

                                    <input
                                        type="text"
                                        name="invoice_number"
                                        class="form-control"
                                        value="{{ old('invoice_number', 'INV-' . date('YmdHis')) }}"
                                        required
                                    >

                                </div>

                            </div>


                            <!-- CART -->
                            <div class="table-responsive">

                                <table class="table align-middle">

                                    <thead>

                                        <tr>

                                            <th>
                                                Produk
                                            </th>

                                            <th>
                                                Harga
                                            </th>

                                            <th>
                                                Stok
                                            </th>

                                            <th>
                                                Qty
                                            </th>

                                            <th>
                                                Subtotal
                                            </th>

                                            <th></th>

                                        </tr>

                                    </thead>


                                    <tbody id="cartBody">

                                        <tr id="emptyCart">

                                            <td colspan="6">

                                                <div class="empty-cart">

                                                    <i class="bi bi-cart-x d-block mb-3"></i>

                                                    <div class="fw-semibold">
                                                        Keranjang masih kosong
                                                    </div>

                                                    <small>
                                                        Cari produk di atas untuk menambahkannya.
                                                    </small>

                                                </div>

                                            </td>

                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- RIGHT -->
                <div class="col-lg-4">

                    <div class="card-custom">

                        <div class="card-header-custom">

                            <i class="bi bi-receipt me-2"></i>

                            Pembayaran

                        </div>


                        <div class="card-body-custom">


                            <!-- SUMMARY -->
                            <div class="summary-box mb-4">

                                <div class="summary-row">

                                    <span class="text-muted">
                                        Subtotal
                                    </span>

                                    <strong id="subtotalText">
                                        Rp 0
                                    </strong>

                                </div>


                                <div class="summary-row">

                                    <span class="text-muted">
                                        Diskon
                                    </span>

                                    <div style="width: 140px;">

                                        <input
                                            type="number"
                                            name="discount"
                                            id="discount"
                                            class="form-control text-end"
                                            value="{{ old('discount', 0) }}"
                                            min="0"
                                            step="0.01"
                                        >

                                    </div>

                                </div>


                                <div class="summary-row summary-total">

                                    <span>
                                        Total
                                    </span>

                                    <span
                                        class="total-value"
                                        id="totalText"
                                    >
                                        Rp 0
                                    </span>

                                </div>

                            </div>


                            <!-- PAYMENT METHOD -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Metode Pembayaran
                                </label>

                                <select
                                    name="payment_method"
                                    id="paymentMethod"
                                    class="form-select"
                                    required
                                >

                                    <option value="cash">
                                        Cash
                                    </option>

                                    <option value="transfer">
                                        Transfer
                                    </option>

                                    <option value="qris">
                                        QRIS
                                    </option>

                                    <option value="card">
                                        Kartu
                                    </option>

                                </select>

                            </div>


                            <!-- PAID -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Dibayar
                                </label>

                                <input
                                    type="number"
                                    name="paid_amount"
                                    id="paidAmount"
                                    class="form-control form-control-lg"
                                    min="0"
                                    step="0.01"
                                    value="{{ old('paid_amount', 0) }}"
                                    required
                                >

                            </div>


                            <!-- CHANGE -->
                            <div class="mb-3">

                                <label class="form-label">
                                    Kembalian
                                </label>

                                <input
                                    type="text"
                                    id="changeDisplay"
                                    class="form-control form-control-lg fw-bold"
                                    value="Rp 0"
                                    readonly
                                >

                            </div>


                            <!-- NOTES -->
                            <div class="mb-4">

                                <label class="form-label">
                                    Catatan
                                </label>

                                <textarea
                                    name="notes"
                                    class="form-control"
                                    rows="3"
                                    placeholder="Catatan transaksi (opsional)"
                                >{{ old('notes') }}</textarea>

                            </div>


                            <!-- SUBMIT -->
                            <button
                                type="submit"
                                id="submitButton"
                                class="btn btn-orange w-100 py-3"
                            >

                                <i class="bi bi-check2-circle me-1"></i>

                                Proses Penjualan

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>


    <!-- JAVASCRIPT -->
    <script>

        const products = {!! json_encode(
            $products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'sku' => $product->sku,
                    'selling_price' => (float) $product->selling_price,
                    'stock' => (int) $product->stock,
                    'unit' => $product->unit,
                ];
            })->values()
        ) !!};


        let cart = [];


        const productSearch =
            document.getElementById('productSearch');

        const productResults =
            document.getElementById('productResults');

        const cartBody =
            document.getElementById('cartBody');

        const discountInput =
            document.getElementById('discount');

        const paidAmount =
            document.getElementById('paidAmount');

        const subtotalText =
            document.getElementById('subtotalText');

        const totalText =
            document.getElementById('totalText');

        const changeDisplay =
            document.getElementById('changeDisplay');

        const saleForm =
            document.getElementById('saleForm');

        const submitButton =
            document.getElementById('submitButton');


        function formatRupiah(number) {

            return new Intl.NumberFormat(
                'id-ID',
                {
                    style: 'currency',
                    currency: 'IDR',
                    maximumFractionDigits: 0
                }
            ).format(number);

        }


        function escapeHtml(text) {

            const div =
                document.createElement('div');

            div.textContent = text;

            return div.innerHTML;

        }


        function showProducts(keyword = '') {

            const search =
                keyword.toLowerCase().trim();


            const filtered =
                products
                    .filter(function (product) {

                        return (
                            product.name
                                .toLowerCase()
                                .includes(search)
                            ||
                            product.sku
                                .toLowerCase()
                                .includes(search)
                        );

                    })
                    .slice(0, 10);


            if (!filtered.length) {

                productResults.innerHTML = `
                    <div class="p-3 text-muted">
                        Produk tidak ditemukan.
                    </div>
                `;

                productResults.style.display =
                    'block';

                return;

            }


            productResults.innerHTML =
                filtered.map(function (product) {

                    return `

                        <div
                            class="product-result"
                            onclick="addProduct(${product.id})"
                        >

                            <div class="product-name">
                                ${escapeHtml(product.name)}
                            </div>

                            <div class="product-meta">

                                SKU:
                                ${escapeHtml(product.sku)}

                                &nbsp; • &nbsp;

                                Stok:
                                ${product.stock}
                                ${escapeHtml(product.unit)}

                                &nbsp; • &nbsp;

                                ${formatRupiah(product.selling_price)}

                            </div>

                        </div>

                    `;

                }).join('');


            productResults.style.display =
                'block';

        }


        function addProduct(productId) {

            const product =
                products.find(function (item) {

                    return item.id === productId;

                });


            if (!product) {
                return;
            }


            const existing =
                cart.find(function (item) {

                    return item.product_id === productId;

                });


            if (existing) {

                if (existing.quantity >= product.stock) {

                    alert(
                        `Stok ${product.name} hanya tersedia ${product.stock}.`
                    );

                    return;

                }

                existing.quantity++;

            } else {

                cart.push({

                    product_id: product.id,

                    name: product.name,

                    sku: product.sku,

                    selling_price: product.selling_price,

                    stock: product.stock,

                    unit: product.unit,

                    quantity: 1

                });

            }


            productSearch.value = '';

            productResults.style.display =
                'none';

            renderCart();

        }


        function removeProduct(productId) {

            cart =
                cart.filter(function (item) {

                    return item.product_id !== productId;

                });


            renderCart();

        }


        function updateQuantity(productId, quantity) {

            const item =
                cart.find(function (item) {

                    return item.product_id === productId;

                });


            if (!item) {
                return;
            }


            quantity =
                parseInt(quantity) || 1;


            if (quantity < 1) {
                quantity = 1;
            }


            if (quantity > item.stock) {

                alert(
                    `Stok ${item.name} hanya tersedia ${item.stock}.`
                );

                quantity = item.stock;

            }


            item.quantity = quantity;

            renderCart();

        }


        function renderCart() {

            if (!cart.length) {

                cartBody.innerHTML = `

                    <tr id="emptyCart">

                        <td colspan="6">

                            <div class="empty-cart">

                                <i class="bi bi-cart-x d-block mb-3"></i>

                                <div class="fw-semibold">
                                    Keranjang masih kosong
                                </div>

                                <small>
                                    Cari produk di atas untuk menambahkannya.
                                </small>

                            </div>

                        </td>

                    </tr>

                `;

                updateSummary();

                return;

            }


            cartBody.innerHTML =
                cart.map(function (item, index) {

                    const subtotal =
                        item.quantity *
                        item.selling_price;


                    return `

                        <tr>

                            <td>

                                <div class="fw-semibold">
                                    ${escapeHtml(item.name)}
                                </div>

                                <small class="text-muted">
                                    ${escapeHtml(item.sku)}
                                </small>

                                <input
                                    type="hidden"
                                    name="items[${index}][product_id]"
                                    value="${item.product_id}"
                                >

                            </td>


                            <td>

                                ${formatRupiah(item.selling_price)}

                                <input
                                    type="hidden"
                                    name="items[${index}][selling_price]"
                                    value="${item.selling_price}"
                                >

                            </td>


                            <td>

                                <span class="badge badge-stock">

                                    ${item.stock}
                                    ${escapeHtml(item.unit)}

                                </span>

                            </td>


                            <td>

                                <input
                                    type="number"
                                    class="form-control qty-input"
                                    min="1"
                                    max="${item.stock}"
                                    value="${item.quantity}"
                                    name="items[${index}][quantity]"
                                    onchange="updateQuantity(${item.product_id}, this.value)"
                                >

                            </td>


                            <td class="fw-semibold">

                                ${formatRupiah(subtotal)}

                            </td>


                            <td class="text-end">

                                <button
                                    type="button"
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="removeProduct(${item.product_id})"
                                >

                                    <i class="bi bi-trash"></i>

                                </button>

                            </td>

                        </tr>

                    `;

                }).join('');


            updateSummary();

        }


        function updateSummary() {

            const subtotal =
                cart.reduce(
                    function (total, item) {

                        return total +
                            (
                                item.quantity *
                                item.selling_price
                            );

                    },
                    0
                );


            let discount =
                parseFloat(
                    discountInput.value
                ) || 0;


            if (discount < 0) {

                discount = 0;

                discountInput.value = 0;

            }


            if (discount > subtotal) {

                discount = subtotal;

                discountInput.value =
                    subtotal;

            }


            const total =
                subtotal - discount;


            const paid =
                parseFloat(
                    paidAmount.value
                ) || 0;


            const change =
                Math.max(
                    paid - total,
                    0
                );


            subtotalText.textContent =
                formatRupiah(subtotal);


            totalText.textContent =
                formatRupiah(total);


            changeDisplay.value =
                formatRupiah(change);

        }


        productSearch.addEventListener(
            'focus',
            function () {

                showProducts(
                    productSearch.value
                );

            }
        );


        productSearch.addEventListener(
            'input',
            function () {

                showProducts(
                    productSearch.value
                );

            }
        );


        document.addEventListener(
            'click',
            function (event) {

                if (
                    !productSearch.contains(event.target)
                    &&
                    !productResults.contains(event.target)
                ) {

                    productResults.style.display =
                        'none';

                }

            }
        );


        discountInput.addEventListener(
            'input',
            updateSummary
        );


        paidAmount.addEventListener(
            'input',
            updateSummary
        );


        saleForm.addEventListener(
            'submit',
            function (event) {

                if (!cart.length) {

                    event.preventDefault();

                    alert(
                        'Tambahkan minimal satu produk ke keranjang.'
                    );

                    return;

                }


                const subtotal =
                    cart.reduce(
                        function (total, item) {

                            return total +
                                (
                                    item.quantity *
                                    item.selling_price
                                );

                        },
                        0
                    );


                const discount =
                    parseFloat(
                        discountInput.value
                    ) || 0;


                const total =
                    subtotal - discount;


                const paid =
                    parseFloat(
                        paidAmount.value
                    ) || 0;


                if (discount > subtotal) {

                    event.preventDefault();

                    alert(
                        'Diskon tidak boleh lebih besar dari subtotal.'
                    );

                    return;

                }


                if (paid < total) {

                    event.preventDefault();

                    alert(
                        'Jumlah pembayaran masih kurang dari total transaksi.'
                    );

                    paidAmount.focus();

                    return;

                }


                submitButton.disabled =
                    true;

                submitButton.innerHTML = `

                    <span
                        class="spinner-border spinner-border-sm me-2"
                    ></span>

                    Memproses...

                `;

            }
        );


        renderCart();

    </script>

</body>
</html>