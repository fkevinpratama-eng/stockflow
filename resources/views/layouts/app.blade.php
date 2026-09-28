<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'StockFlow')
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f7f8fa;
            color: #252525;
            font-family:
                Inter,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
        }


        /* SIDEBAR */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 245px;
            height: 100vh;

            background: #ffffff;
            border-right: 1px solid #eeeeee;

            display: flex;
            flex-direction: column;

            z-index: 1000;
        }


        .sidebar-brand {
            height: 76px;

            display: flex;
            align-items: center;

            gap: 12px;

            padding: 0 20px;

            border-bottom: 1px solid #eeeeee;
        }


        .brand-icon {
            width: 40px;
            height: 40px;

            border-radius: 11px;

            background: #ff6600;
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 19px;
        }


        .brand-name {
            font-size: 18px;
            font-weight: 750;
        }


        .brand-subtitle {
            font-size: 11px;
            color: #999999;
            margin-top: 1px;
        }


        .sidebar-menu {
            flex: 1;

            overflow-y: auto;

            padding: 18px 12px;
        }


        .sidebar-link {
            display: flex;
            align-items: center;

            gap: 12px;

            height: 44px;

            padding: 0 13px;

            margin-bottom: 4px;

            border-radius: 10px;

            color: #626262;

            text-decoration: none;

            font-size: 14px;
            font-weight: 500;

            transition: 0.2s ease;
        }


        .sidebar-link i {
            width: 20px;

            text-align: center;

            font-size: 16px;
        }


        .sidebar-link:hover {
            background: #fff1e8;
            color: #ff6600;
        }


        .sidebar-link.active {
            background: #ff6600;
            color: white;

            font-weight: 600;
        }


        .sidebar-section {
            margin-top: 24px;
        }


        .sidebar-title {
            padding: 0 12px;

            margin-bottom: 8px;

            font-size: 10px;

            font-weight: 700;

            letter-spacing: 1px;

            color: #999999;
        }


        /* SIDEBAR FOOTER */

        .sidebar-footer {
            min-height: 72px;

            padding: 14px;

            border-top: 1px solid #eeeeee;

            display: flex;
            align-items: center;

            gap: 10px;
        }


        .user-avatar {
            width: 38px;
            height: 38px;

            flex-shrink: 0;

            border-radius: 50%;

            background: #ff6600;
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;
            font-weight: 700;
        }


        .user-detail {
            flex: 1;
            min-width: 0;
        }


        .user-name {
            font-size: 13px;
            font-weight: 600;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }


        .user-role {
            font-size: 11px;
            color: #999999;

            margin-top: 2px;
        }


        .logout-button {
            width: 34px;
            height: 34px;

            border: none;

            border-radius: 8px;

            background: #fff1e8;
            color: #ff6600;

            display: flex;
            align-items: center;
            justify-content: center;

            cursor: pointer;

            transition: 0.2s;
        }


        .logout-button:hover {
            background: #ff6600;
            color: white;
        }


        /* MAIN */

        .main-content {
            margin-left: 245px;

            min-height: 100vh;

            padding: 30px;
        }


        @media (max-width: 768px) {

            .sidebar {
                width: 220px;
            }

            .main-content {
                margin-left: 220px;
                padding: 20px;
            }

        }

    </style>

    @stack('styles')

</head>


<body>

    @include('partials.sidebar')


    <main class="main-content">

        @yield('content')

    </main>


    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

    @stack('scripts')

</body>

</html>