<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar with Dropdown</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Sidebar style */
        #sidebar {
            transition: transform 0.3s ease;
            width: 320px; /* Increased sidebar width */
            height: 100vh; /* Full height */
            position: fixed; /* Sidebar should be fixed */
            z-index: 100; /* Ensure it's above content */
            display: flex;
            flex-direction: column;
            padding-top: 30px; /* Added space on top */
        }

        /* Main Content transition */
        #mainContent {
            transition: margin-left 0.3s ease;
            padding: 20px;
            width: 100%;
        }

        /* Sidebar hidden for mobile */
        .sidebar-hidden {
            transform: translateX(-100%); /* Hide the sidebar */
        }

        /* Sidebar visible for mobile */
        .sidebar-visible {
            transform: translateX(0); /* Show the sidebar */
        }

        /* Sidebar width and main content margin on desktop */
        @media (min-width: 640px) {
            #sidebar {
                transform: translateX(0);
            }

            #mainContent {
                margin-left: 320px; /* Increased sidebar width */
            }
        }

        /* Sidebar width and position on mobile */
        @media (max-width: 640px) {
            #mainContent {
                margin-left: 0 !important;
                width: 100%;
            }

            #sidebar {
                width: 100%; /* Sidebar takes full width on small screens */
                position: absolute;
                top: 0;
                left: 0;
                background-color: #3148A8;
                height: 100vh; /* Full height */
            }

            /* Make the sidebar look better when collapsed */
            .sidebar-hidden {
                transform: translateX(-100%); /* Fully hide sidebar on mobile */
            }
        }

        /* Sidebar sections */
        .sidebar-section {
            padding: 20px;
            flex-grow: 1;
            margin-bottom: 20px;
        }

        .sidebar-logo-text {
            flex-grow: 0;
            margin-bottom: 20px;
            background-color: #1E2C67;
            padding: 20px 0;
            border-radius: 12px;
        }

        /* Sidebar menu and logout button */
        .sidebar-menu {
            flex-grow: 2;
            margin-bottom: 20px;
        }

        .sidebar-logout {
            flex-grow: 0;
            margin-top: auto;
        }

        /* Hover effect for menu items */
        .sidebar-menu a:hover {
            background-color: #1E2C67;
            color: white; /* White text color when hovering */
        }

        /* Hover effect for submenu items */
        .sidebar-menu .collapse a:hover {
            background-color: #1E2C67;
            color: white;
        }

        /* Active state for menu items */
        .sidebar-menu a.active, .sidebar-menu .collapse a.active {
            background-color: #1E2C67;
            font-weight: bold; /* Bold text for active item */
        }

        /* Sidebar menu */
        .sidebar-menu a {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Sidebar logo section */
        .sidebar-logo-text {
            text-align: center;
            color: white;
            font-size: 24px;
        }

        /* Menu icon */
        .sidebar-menu a i {
            margin-right: 10px;
        }

        /* Mobile Hamburger Button */
        #sidebarToggle {
            background-color: #3148A8;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        /* Add padding and margin for sidebar links */
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-radius: 8px;
        }

        /* Sidebar dropdown effect */
        .sidebar-menu .collapse {
            display: none;
        }

        .sidebar-menu .collapse.show {
            display: block;
        }

        /* Responsive layout for smaller screens */
        @media (max-width: 640px) {
            /* Adjust sidebar width for mobile */
            #sidebar {
                width: 100%;
                position: absolute;
                top: 0;
                left: 0;
                background-color: #3148A8;
                height: 100vh;
            }

            /* Full width main content when sidebar is hidden */
            #mainContent {
                width: 100%;
                margin-left: 0;
            }

            /* Remove margins for mobile */
            #sidebarToggle {
                margin: 10px;
            }

            .sidebar-section {
                padding: 15px;
            }

            .sidebar-menu a:hover {
                background-color: #1E2C67;
                color: white;
            }

            /* Responsive table for mobile */
            table {
                width: 100%;
                table-layout: fixed;
            }

            /* Adjust padding for small screen */
            table td, table th {
                padding: 8px;
            }

            /* Adjust font size for mobile */
            .table td, .table th {
                font-size: 0.9rem;
            }
        }

        /* Add scroll for sidebar content */
        #sidebar {
            overflow-y: auto;
            max-height: 100vh;
        }

        #sidebar .sidebar-section {
            overflow-y: auto;
            flex-grow: 1;
        }

        /* Apply smooth transition on scroll */
        #sidebar .sidebar-section::-webkit-scrollbar {
            width: 5px;
        }

        #sidebar .sidebar-section::-webkit-scrollbar-thumb {
            background-color: #1E2C67;
            border-radius: 5px;
        }

    </style>
</head>
<body style="font-family: 'Poppins', sans-serif;">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="bg-[#3148A8] text-white p-6 min-h-screen sidebar-hidden">
            <div class="sidebar-section sidebar-logo-text">
                <!-- Logo and Text -->
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('images/logoDinkes-remove.png') }}" alt="Logo" style="width: 120px;">
                </div>
                <h3 class="text-center text-lg font-semibold mb-2">Website Admin</h3>
            </div>

            <div class="sidebar-section sidebar-menu">
                <ul class="list-unstyled">
                    <!-- Dashboard Dropdown -->
                    <li class="nav-item">
                        <a class="nav-link text-white d-flex align-items-center py-2 px-4 mb-2 hover:bg-[#1E2C67] rounded-lg cursor-pointer" href="#" id="dashboardToggle">
                            <i class="bi bi-layout-text-window-reverse me-3"></i> Dashboard
                            <i class="bi bi-chevron-down ms-auto" id="chevronIcon"></i>
                        </a>
                        <div class="collapse" id="dashboardDropdown">
                            <ul class="list-unstyled ps-3">
                                <li><a href="{{ route('peta.difteri') }}" class="text-white d-block py-2 px-4 mb-2 hover:bg-[#1E2C67] rounded-lg"><i class="bi bi-map me-2"></i> Peta Kerawanan</a></li>
                                <li><a href="{{ route('grafik.difteri') }}" class="text-white d-block py-2 px-4 mb-2 hover:bg-[#1E2C67] rounded-lg"><i class="bi bi-bar-chart me-2"></i> Grafik Persebaran</a></li>
                            </ul>
                        </div>
                    </li>
                    <!-- Single links -->
                    <li>
                        <a href="{{ route('data-difteri.index') }}" class="text-white d-flex align-items-center py-2 px-4 mb-2 hover:bg-[#1E2C67] rounded-lg cursor-pointer text-decoration-none">
                            <i class="bi bi-table me-3"></i> Data Kriteria
                        </a>
                    </li>
                    {{-- <li>
                        <a href="#" class="text-white d-flex align-items-center py-2 px-4 mb-2 hover:bg-[#1E2C67] rounded-lg cursor-pointer text-decoration-none">
                            <i class="bi bi-clipboard-pulse me-3"></i> Data Klaster
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('puskesmas.index') }}" class="text-white d-flex align-items-center py-2 px-4 mb-2 hover:bg-[#1E2C67] rounded-lg cursor-pointer text-decoration-none">
                            <i class="bi bi-hospital-fill me-3"></i> Data Puskesmas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kecamatan.index') }}" class="text-white d-flex align-items-center py-2 px-4 mb-2 hover:bg-[#1E2C67] rounded-lg cursor-pointer text-decoration-none">
                            <i class="bi bi-bank me-3"></i> Data Kecamatan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tahun.index') }}" class="text-white d-flex align-items-center py-2 px-4 mb-2 hover:bg-[#1E2C67] rounded-lg cursor-pointer text-decoration-none">
                            <i class="bi bi-calendar me-3"></i> Data Tahun
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-section sidebar-logout">
                <!-- Logout Menu -->
                <ul class="list-unstyled">
                    <li>
                        <a href="#" class="text-white d-flex align-items-center py-2 px-4 mb-2 hover:bg-[#1E2C67] rounded-lg cursor-pointer text-decoration-none"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right me-3"></i> Keluar
                        </a>
                    </li>
                </ul>

                <!-- Form Logout -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div id="mainContent" class="flex-1 sm:ml-80 p-4">
            <!-- Hamburger Toggle Button for Mobile -->
            <button id="sidebarToggle" class="sidebar-toggle-btn sm:hidden bg-[#3148A8] text-white px-4 py-2 rounded-md mb-4">
                <i class="bi bi-list"></i>
            </button>
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap and Icons for ease of use -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.js"></script>

    <script>
        // Sidebar toggle functionality for mobile
        const sidebar = document.getElementById("sidebar");
        const sidebarToggle = document.getElementById("sidebarToggle");
        const mainContent = document.getElementById("mainContent");

        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("sidebar-hidden");
            sidebar.classList.toggle("sidebar-visible");

            // Adjust main content margin depending on sidebar state
            if (sidebar.classList.contains("sidebar-hidden")) {
                mainContent.style.marginLeft = "0";
                mainContent.style.width = "100%";
            } else {
                mainContent.style.marginLeft = "320px";
                mainContent.style.width = "calc(100% - 320px)";
            }
        });

        // Sidebar dropdown toggle for Dashboard
        const dashboardToggle = document.getElementById("dashboardToggle");
        const dashboardDropdown = document.getElementById("dashboardDropdown");
        const chevronIcon = document.getElementById("chevronIcon");

        dashboardToggle.addEventListener("click", () => {
            const isCollapsed = dashboardDropdown.classList.contains("collapse");

            // Toggle the dropdown visibility
            if (isCollapsed) {
                dashboardDropdown.classList.remove("collapse");
                chevronIcon.classList.remove("bi-chevron-down");
                chevronIcon.classList.add("bi-chevron-up");  // Change chevron direction
            } else {
                dashboardDropdown.classList.add("collapse");
                chevronIcon.classList.remove("bi-chevron-up");
                chevronIcon.classList.add("bi-chevron-down");  // Reset chevron direction
            }
        });
    </script>
</body>
</html>
