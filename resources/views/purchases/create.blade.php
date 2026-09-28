<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Pembelian - StockFlow</title>

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
            padding: 30px;
            max-width: 1500px;
            margin: 0 auto;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .back-link {
            color: #777777;
            text-decoration: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 12px;
        }

        .back-link:hover {
            color: var(--orange);
        }

        .page-title {
            margin: 0;
            font-size: 27px;
            font-weight: 700;
        }

        .page-subtitle {
            color: #888888;
            font-size: 14px;
            margin-top: 6px;
        }

        /* =========================
           CARD
        ========================= */

        .card-custom {
            background: #ffffff;
            border: 1px solid var(--border);
            border-radius: 15px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.03);
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
            font-size: 16px;
            font-weight: 700;
            margin: 0;
        }

        .card-body-custom {
            padding: 22px;
        }

        /* =========================
           FORM
        ========================= */

        .form-label {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .form-control,
        .form-select {
            border: 1px solid #dddddd;
            border-radius: 9px;
            padding: 10px 12px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--orange);
            box-shadow: 0 0 0 3px rgba(255, 102, 0, 0.10);
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            overflow-x: auto;
        }

        .items-table {
            width: 100%;
            min-width: 950px;
            margin: 0;
        }

        .items-table th {
            background: #fafafa;
            padding: 14px 12px;
            font-size: 12px;
            color: #777777;
            text-transform: uppercase;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .items-table td {
            padding: 12px;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: middle;
        }

        .product-select {
            min-width: 300px;
        }

        .quantity-input {
            min-width: 100px;
        }

        .price-input {
            min-width: 160px;
        }

        .product-stock {
            color: #888888;
            font-size: 12px;
            margin-top: 6px;
        }

        .product-stock strong {
            color: var(--orange);
        }

        .subtotal-display {
            font-weight: 700;
            white-space: nowrap;
        }

        /* =========================
           DELETE BUTTON
        ========================= */

        .remove-item {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 1px solid #eeeeee;
            background: #ffffff;
            color: #dc3545;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .remove-item:hover {
            background: #fff1f1;
            border-color: #dc3545;
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

        .btn-outline-orange {
            background: #ffffff;
            color: var(--orange);
            border: 1px solid var(--orange);
            font-weight: 600;
            border-radius: 9px;
            padding: 9px 15px;
        }

        .btn-outline-orange:hover {
            background: var(--orange-soft);
            color: var(--orange-dark);
            border-color: var(--orange-dark);
        }

        /* =========================
           TOTAL
        ========================= */

        .total-box {
            background: var(--orange-soft);
            border-radius: 12px;
            padding: 20px;
        }

        .total-label {
            font-size: 13px;
            color: #777777;
            margin-bottom: 4px;
        }

        .total-value {
            color: var(--orange);
            font-size: 26px;
            font-weight: 800;
        }

        /* =========================
           FOOTER BUTTON
        ========================= */

        .form-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 30px;
        }

        /* =========================
           ALERT
        ========================= */

        .alert {
            border: none;
            border-radius: 10px;
        }

        .alert ul {
            margin-bottom: 0;
        }

        /* =========================
           EMPTY
        ========================= */

        .empty-products {
            text-align: center;
            padding: 40px 20px;
            color: #888888;
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

            .page-title {
                font-size: 23px;
            }

            .card-header-custom {
                align-items: flex-start;
                flex-direction: column;
            }

            .form-footer {
                flex-direction: column-reverse;
            }

            .form-footer .btn,
            .form-footer a {
                width: 100%;
                text-align: center;
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
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
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


    <!-- HEADER -->

    <div class="page-header">

        <a
            href="{{ route('purchases.index') }}"
            class="back-link"
        >

            <i class="bi bi-arrow-left"></i>

            Kembali ke Pembelian

        </a>


        <h1 class="page-title">
            Tambah Pembelian
        </h1>


        <div class="page-subtitle">
            Catat barang masuk dari supplier.
        </div>

    </div>


    <!-- =========================
         ERROR VALIDATION
    ========================= -->

    @if($errors->any())

        <div class="alert alert-danger mb-4">

            <div class="fw-bold mb-2">

                <i class="bi bi-exclamation-circle me-2"></i>

                Periksa kembali data pembelian.

            </div>


            <ul class="ps-3">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- =========================
         FORM
    ========================= -->

    <form
        action="{{ route('purchases.store') }}"
        method="POST"
        id="purchaseForm"
    >

        @csrf


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

                <div class="row g-3">


                    <!-- SUPPLIER -->

                    <div class="col-md-5">

                        <label class="form-label">

                            Supplier

                            <span class="text-danger">*</span>

                        </label>


                        <select
                            name="supplier_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                -- Pilih Supplier --
                            </option>


                            @foreach($suppliers as $supplier)

                                <option
                                    value="{{ $supplier->id }}"
                                    @selected(old('supplier_id') == $supplier->id)
                                >

                                    {{ $supplier->code }}
                                    -
                                    {{ $supplier->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    <!-- INVOICE -->

                    <div class="col-md-4">

                        <label class="form-label">

                            Nomor Invoice

                            <span class="text-danger">*</span>

                        </label>


                        <input
                            type="text"
                            name="invoice_number"
                            class="form-control"
                            value="{{ old('invoice_number') }}"
                            placeholder="Contoh: INV-2026-001"
                            required
                        >

                    </div>


                    <!-- TANGGAL -->

                    <div class="col-md-3">

                        <label class="form-label">

                            Tanggal Pembelian

                            <span class="text-danger">*</span>

                        </label>


                        <input
                            type="date"
                            name="purchase_date"
                            class="form-control"
                            value="{{ old('purchase_date', date('Y-m-d')) }}"
                            required
                        >

                    </div>


                    <!-- CATATAN -->

                    <div class="col-12">

                        <label class="form-label">
                            Catatan
                        </label>


                        <textarea
                            name="notes"
                            class="form-control"
                            rows="3"
                            placeholder="Catatan tambahan jika diperlukan..."
                        >{{ old('notes') }}</textarea>

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


                <button
                    type="button"
                    class="btn btn-outline-orange"
                    id="addItem"
                >

                    <i class="bi bi-plus-lg me-2"></i>

                    Tambah Produk

                </button>

            </div>


            <div class="table-wrapper">

                <table class="items-table">

                    <thead>

                        <tr>

                            <th width="50">
                                #
                            </th>

                            <th>
                                Produk
                            </th>

                            <th width="140">
                                Qty
                            </th>

                            <th width="190">
                                Harga Beli
                            </th>

                            <th width="190">
                                Subtotal
                            </th>

                            <th width="70">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody id="itemsBody">

                    </tbody>

                </table>

            </div>


            <!-- TOTAL -->

            <div class="card-body-custom">

                <div class="row justify-content-end">

                    <div class="col-md-5">

                        <div class="total-box">

                            <div class="total-label">
                                Total Pembelian
                            </div>


                            <div
                                class="total-value"
                                id="grandTotal"
                            >
                                Rp 0
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- =========================
             BUTTON
        ========================= -->

        <div class="form-footer">

            <a
                href="{{ route('purchases.index') }}"
                class="btn btn-light border px-4"
            >

                Batal

            </a>


            <button
                type="submit"
                class="btn btn-orange px-4"
                id="submitButton"
            >

                <i class="bi bi-check-lg me-2"></i>

                Simpan Pembelian

            </button>

        </div>

    </form>

</main>


<script>

/*
|--------------------------------------------------------------------------
| DATA PRODUK DARI DATABASE
|--------------------------------------------------------------------------
*/

const products = [

    @foreach($products as $product)

    {
        id: {{ $product->id }},

        name: @json($product->name),

        sku: @json($product->sku),

        purchase_price: {{ (float) $product->purchase_price }},

        stock: {{ (int) $product->stock }},

        unit: @json($product->unit)
    },

    @endforeach

];


/*
|--------------------------------------------------------------------------
| ELEMENT
|--------------------------------------------------------------------------
*/

const itemsBody =
    document.getElementById('itemsBody');

const addItemButton =
    document.getElementById('addItem');

const grandTotal =
    document.getElementById('grandTotal');

const purchaseForm =
    document.getElementById('purchaseForm');

const submitButton =
    document.getElementById('submitButton');


/*
|--------------------------------------------------------------------------
| INDEX BARIS
|--------------------------------------------------------------------------
*/

let itemIndex = 0;


/*
|--------------------------------------------------------------------------
| FORMAT RUPIAH
|--------------------------------------------------------------------------
*/

function formatRupiah(value)
{
    return 'Rp ' +
        new Intl.NumberFormat('id-ID').format(value);
}


/*
|--------------------------------------------------------------------------
| BUAT PILIHAN PRODUK
|--------------------------------------------------------------------------
*/

function createProductOptions()
{
    let options = `
        <option value="">
            -- Pilih Produk --
        </option>
    `;


    products.forEach(function(product)
    {

        options += `
            <option value="${product.id}">
                ${product.sku} - ${product.name}
            </option>
        `;

    });


    return options;
}


/*
|--------------------------------------------------------------------------
| TAMBAH BARIS PRODUK
|--------------------------------------------------------------------------
*/

function addItem()
{

    const row =
        document.createElement('tr');


    row.dataset.index =
        itemIndex;


    row.innerHTML = `

        <td class="row-number">
            1
        </td>


        <td>

            <select
                name="items[${itemIndex}][product_id]"
                class="form-select product-select"
                required
            >

                ${createProductOptions()}

            </select>


            <div class="product-stock stock-info"></div>

        </td>


        <td>

            <input
                type="number"
                name="items[${itemIndex}][quantity]"
                class="form-control quantity-input"
                min="1"
                value="1"
                required
            >

        </td>


        <td>

            <input
                type="number"
                name="items[${itemIndex}][purchase_price]"
                class="form-control price-input"
                min="0"
                step="0.01"
                value="0"
                required
            >

        </td>


        <td>

            <div class="subtotal-display">
                Rp 0
            </div>

        </td>


        <td>

            <button
                type="button"
                class="remove-item"
                title="Hapus produk"
            >

                <i class="bi bi-trash"></i>

            </button>

        </td>

    `;


    itemsBody.appendChild(row);


    /*
    |--------------------------------------------------------------------------
    | AMBIL ELEMENT BARIS
    |--------------------------------------------------------------------------
    */

    const productSelect =
        row.querySelector('.product-select');

    const quantityInput =
        row.querySelector('.quantity-input');

    const priceInput =
        row.querySelector('.price-input');

    const removeButton =
        row.querySelector('.remove-item');

    const stockInfo =
        row.querySelector('.stock-info');


    /*
    |--------------------------------------------------------------------------
    | PILIH PRODUK
    |--------------------------------------------------------------------------
    */

    productSelect.addEventListener(
        'change',
        function()
        {

            const selectedProduct =
                products.find(function(product)
                {

                    return product.id ==
                        productSelect.value;

                });


            if (selectedProduct)
            {

                /*
                | Harga beli otomatis
                */

                priceInput.value =
                    selectedProduct.purchase_price;


                /*
                | Informasi stok
                */

                stockInfo.innerHTML = `
                    <i class="bi bi-box-seam me-1"></i>
                    Stok saat ini:
                    <strong>
                        ${selectedProduct.stock}
                    </strong>
                    ${selectedProduct.unit}
                `;

            }
            else
            {

                priceInput.value =
                    0;


                stockInfo.innerHTML =
                    '';

            }


            /*
            | Hitung subtotal
            */

            calculateRow(row);

        }
    );


    /*
    |--------------------------------------------------------------------------
    | QTY
    |--------------------------------------------------------------------------
    */

    quantityInput.addEventListener(
        'input',
        function()
        {

            calculateRow(row);

        }
    );


    /*
    |--------------------------------------------------------------------------
    | HARGA BELI
    |--------------------------------------------------------------------------
    */

    priceInput.addEventListener(
        'input',
        function()
        {

            calculateRow(row);

        }
    );


    /*
    |--------------------------------------------------------------------------
    | HAPUS PRODUK
    |--------------------------------------------------------------------------
    */

    removeButton.addEventListener(
        'click',
        function()
        {

            row.remove();

            updateRowNumbers();

            calculateGrandTotal();

        }
    );


    itemIndex++;


    updateRowNumbers();

}


/*
|--------------------------------------------------------------------------
| HITUNG SUBTOTAL
|--------------------------------------------------------------------------
*/

function calculateRow(row)
{

    const quantity =
        parseFloat(
            row.querySelector(
                '.quantity-input'
            ).value
        ) || 0;


    const price =
        parseFloat(
            row.querySelector(
                '.price-input'
            ).value
        ) || 0;


    const subtotal =
        quantity * price;


    row.querySelector(
        '.subtotal-display'
    ).textContent =
        formatRupiah(subtotal);


    calculateGrandTotal();

}


/*
|--------------------------------------------------------------------------
| HITUNG TOTAL
|--------------------------------------------------------------------------
*/

function calculateGrandTotal()
{

    let total = 0;


    const rows =
        document.querySelectorAll(
            '#itemsBody tr'
        );


    rows.forEach(function(row)
    {

        const quantity =
            parseFloat(
                row.querySelector(
                    '.quantity-input'
                ).value
            ) || 0;


        const price =
            parseFloat(
                row.querySelector(
                    '.price-input'
                ).value
            ) || 0;


        total +=
            quantity * price;

    });


    grandTotal.textContent =
        formatRupiah(total);

}


/*
|--------------------------------------------------------------------------
| UPDATE NOMOR BARIS
|--------------------------------------------------------------------------
*/

function updateRowNumbers()
{

    const rows =
        document.querySelectorAll(
            '#itemsBody tr'
        );


    rows.forEach(function(row, index)
    {

        row.querySelector(
            '.row-number'
        ).textContent =
            index + 1;

    });

}


/*
|--------------------------------------------------------------------------
| CEK PRODUK DUPLIKAT
|--------------------------------------------------------------------------
*/

function hasDuplicateProducts()
{

    const selectedProducts = [];


    const selects =
        document.querySelectorAll(
            '.product-select'
        );


    selects.forEach(function(select)
    {

        if (select.value !== '')
        {

            selectedProducts.push(
                select.value
            );

        }

    });


    return new Set(selectedProducts).size
        !== selectedProducts.length;

}


/*
|--------------------------------------------------------------------------
| TOMBOL TAMBAH PRODUK
|--------------------------------------------------------------------------
*/

addItemButton.addEventListener(
    'click',
    function()
    {

        addItem();

    }
);


/*
|--------------------------------------------------------------------------
| VALIDASI SEBELUM SUBMIT
|--------------------------------------------------------------------------
*/

purchaseForm.addEventListener(
    'submit',
    function(event)
    {

        const rows =
            document.querySelectorAll(
                '#itemsBody tr'
            );


        /*
        | Tidak boleh kosong
        */

        if (rows.length === 0)
        {

            event.preventDefault();


            alert(
                'Minimal harus ada satu produk.'
            );


            return;

        }


        /*
        | Cek produk belum dipilih
        */

        let emptyProduct = false;


        document
            .querySelectorAll('.product-select')
            .forEach(function(select)
            {

                if (select.value === '')
                {

                    emptyProduct = true;

                }

            });


        if (emptyProduct)
        {

            event.preventDefault();


            alert(
                'Silakan pilih produk pada semua baris.'
            );


            return;

        }


        /*
        | Cek produk duplikat
        */

        if (hasDuplicateProducts())
        {

            event.preventDefault();


            alert(
                'Produk yang sama tidak boleh dimasukkan lebih dari satu kali.'
            );


            return;

        }


        /*
        | Disable tombol supaya tidak double submit
        */

        submitButton.disabled =
            true;


        submitButton.innerHTML = `

            <span
                class="spinner-border spinner-border-sm me-2"
            ></span>

            Menyimpan...

        `;

    }
);


/*
|--------------------------------------------------------------------------
| BARIS PERTAMA
|--------------------------------------------------------------------------
*/

addItem();

</script>


</body>
</html>