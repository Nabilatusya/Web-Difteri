<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Difteri Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .nav-link {
            color: #3148A8;
            font-size: 23px;
            font-weight: 500;
            transition: all 0.3s ease-in-out;
            position: relative;
        }

        .nav-link:hover, .nav-link.active {
            color: #3148A8;
            transform: scale(1.05);
            font-weight: 650;
        }

        /* ngatur panjang garis dibawah hover */
        .nav-link:hover::after, .nav-link.active::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 4px;
            background-color: #3148A8;
        }

        .login-btn {
            background: #3148A8;
            color: #FFFFFF;
            padding: 8px 32px;
            font-size: 18px;
            font-weight: 500;
            border-radius: 24px;
            transition: all 0.3s ease-in-out;
            text-transform: uppercase;
        }

        .login-btn:hover {
            background: #1E2C67;
            color: white;
        }

        .mobile-link {
            display: block;
            padding: 12px 20px;
            font-size: 20px;
            font-weight: 600;
            color: #1B262C;
            border-bottom: 1px solid #E5E7EB;
            transition: background 0.3s ease-in-out;
        }

        .mobile-link:hover {
            background: #F3F4F6;
        }

        /* Styling untuk navbar */
        .nav-bar {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-bar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .nav-bar h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #3148A8;
        }

        @media (max-width: 640px) {
            .container {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-link {
                font-size: 18px;
            }

            .login-btn {
                font-size: 16px;
                padding: 6px 24px;
            }

            #menu-btn {
                display: block;
            }

            .hidden {
                display: none;
            }
        }
    </style>
</head>
<body>
    <nav class="nav-bar fixed top-0 left-0 w-full z-10 py-4 px-6" style=" font-family: 'Poppins', sans-serif;">
        <div class="container mx-auto">
            <h1 class="text-[23px] font-semibold text-[#3148A8]">Difteri Dashboard</h1>
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Umum</a>
                <a href="{{ url('/peta-khusus') }}" class="nav-link {{ request()->is('peta-khusus') ? 'active' : '' }}">Peta Khusus</a>
                <a href="{{ url('/data-difteri') }}" class="nav-link {{ request()->is('data-difteri') ? 'active' : '' }}">Data Difteri</a>
                {{-- <a href="{{ route('user.kecamatan.index') }}" class="nav-link {{ request()->routeIs('user.kecamatan.index') ? 'active' : '' }}">Data Klaster</a> --}}
                <a href="{{ route('user.grafik.index') }}" class="nav-link {{ request()->is('user.grafik.index') ? 'active' : '' }}">Grafik</a>
                <a href="{{ route('user.puskesmas.index') }}" class="nav-link {{ request()->routeIs('user.puskesmas.index*') ? 'active' : '' }}">Puskesmas</a>
                <a href="{{ route('login') }}" class="login-btn">Login</a>
            </div>

            <!-- Button Menu untuk Mobile -->
            <button id="menu-btn" class="md:hidden text-[#3148A8] focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Menu Dropdown untuk Mobile -->
        <div id="mobile-menu" class="absolute top-16 left-0 w-full bg-white shadow-md hidden md:hidden">
            <a href="{{ url('/') }}" class="mobile-link {{ request()->is('/') ? 'active' : '' }}">Umum</a>
            <a href="{{ url('/peta-khusus') }}" class="mobile-link {{ request()->is('peta-khusus') ? 'active' : '' }}">Peta Khusus</a>
            <a href="{{ url('/data-difteri') }}" class="mobile-link {{ request()->is('data-difteri') ? 'active' : '' }}">Data Difteri</a>
            {{-- <a href="{{ route('user.kecamatan.index') }}" class="mobile-link {{ request()->routeIs('user.kecamatan.index') ? 'active' : '' }}">Data Klaster</a> --}}
            <a href="{{ route('user.grafik.index') }}" class="mobile-link {{ request()->is('user.grafik.index') ? 'active' : '' }}">Grafik</a>
            <a href="{{ route('user.puskesmas.index') }}" class="mobile-link {{ request()->routeIs('user.puskesmas.index*') ? 'active' : '' }}">Puskesmas</a>
            <a href="{{ route('login') }}" class="mobile-link text-center bg-[#3148A8] text-white">Login</a>
        </div>
    </nav>

    <!-- JavaScript untuk toggle menu di mobile -->
    <script>
        document.getElementById("menu-btn").addEventListener("click", function() {
            document.getElementById("mobile-menu").classList.toggle("hidden");
        });
    </script>
</body>
</html>
