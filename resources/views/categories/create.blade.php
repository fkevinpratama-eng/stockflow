<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tambah Kategori - StockFlow</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        body {
            background: #f7f7f7;
            font-family: Arial, Helvetica, sans-serif;
        }

        .topbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
        }

        .brand {
            color: #ff6600;
            font-size: 24px;
            font-weight: 800;
        }

        .content {
            padding: 30px;
            max-width: 900px;
            margin: auto;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,.05);
        }

        .form-control {
            min-height: 46px;
            border-radius: 9px;
        }

        .form-control:focus {
            border-color: #ff6600;
            box-shadow: 0 0 0 .2rem rgba(255,102,0,.12);
        }

        .btn-orange {
            background: #ff6600;
            color: white;
            border: none;
            border-radius: 9px;
            padding: 10px 20px;
            font-weight: 600;
        }

        .btn-orange:hover {
            background: #e85c00;
            color: white;
        }

    </style>

</head>

<body>


<nav class="topbar">

    <div class="brand">

        <i class="bi bi-box-seam me-2"></i>

        StockFlow

    </div>

</nav>


<main class="content">

    <div class="mb-4">

        <a
            href="{{ route('categories.index') }}"
            class="text-decoration-none"
            style="color:#ff6600;"
        >

            <i class="bi bi-arrow-left me-1"></i>

            Kembali ke Kategori

        </a>

    </div>


    <div class="card">

        <div class="card-body p-4 p-md-5">

            <h3 class="fw-bold mb-1">
                Tambah Kategori
            </h3>

            <p class="text-muted mb-4">
                Tambahkan kategori baru untuk produk StockFlow.
            </p>


            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route('categories.store') }}"
                method="POST"
            >

                @csrf


                <div class="mb-4">

                    <label
                        for="name"
                        class="form-label fw-semibold"
                    >
                        Nama Kategori
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Minuman"
                        required
                    >

                </div>


                <div class="mb-4">

                    <label
                        for="description"
                        class="form-label fw-semibold"
                    >
                        Deskripsi
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        class="form-control"
                        rows="5"
                        placeholder="Deskripsi kategori (opsional)"
                    >{{ old('description') }}</textarea>

                </div>


                <div class="d-flex gap-2">

                    <a
                        href="{{ route('categories.index') }}"
                        class="btn btn-outline-secondary"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-orange"
                    >

                        <i class="bi bi-check-lg me-1"></i>

                        Simpan Kategori

                    </button>

                </div>

            </form>

        </div>

    </div>

</main>


</body>

</html>