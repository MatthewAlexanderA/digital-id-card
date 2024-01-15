<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome, {{ Auth::user()->username }}</title>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/67b6ece322.js" crossorigin="anonymous"></script>

    {{-- Data Table --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">


    <style>
        body {
            overflow-x: hidden;
            /* Hide horizontal scrollbar */
        }
        /* DataTables */
        @media screen and (max-width: 640px) {
            table.dataTable {
                width: 100% !important;
                margin: 0 auto;
            }

            table.dataTable thead th,
            table.dataTable tbody td {
                white-space: nowrap;
            }
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body class="font-sans bg-slate-100 flex flex-col min-h-screen">
    @include('sweetalert::alert')
    <!-- Navigation Bar -->
    <nav class="bg-white flex justify-between shadow-sm">
        <button id="toggleSidebar" class="text-white focus:outline-none bg-[#343a40] p-4 w-14 lg:w-16 lg:fixed lg:border-b-2 lg:border-[#494e52]">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div></div>
        <div class="p-4 lg:mr-2 border-b-2">
            <div class="relative inline-block text-left">
                <button id="dropdown-button" type="button"
                    class="inline-flex items-center px-2 lg:px-4 text-sm font-bold rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600">
                    <i class="fa-solid fa-user mr-1"></i> {{ Auth::user()->username }}
                </button>

                <div id="dropdown-menu"
                    class="hidden origin-top-right absolute right-0 mt-2 w-32 lg:w-52 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-30">
                    <div class="py-2 lg:py-4 px-4 text-sm font-semibold text-gray-700 text-center">
                        <i class="fa-solid fa-user mr-1"></i> <br>
                        {{ Auth::user()->username }}
                    </div>
                    <div class="border-t border-gray-200"></div>
                    <a href="{{ route('setting.index') }}" class="block px-4 py-2 lg:py-3 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                        role="menuitem">
                        <i class="fa-solid fa-user-pen mr-1"></i> Edit Profile
                    </a>
                    <form action="{{ route('logout') }}" method="post" class="block px-4 py-2 lg:py-3 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-right-from-bracket mr-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div id="sidebar"
        class="h-screen w-52 lg:w-64 bg-[#343a40] text-white fixed top-0 left-0 transform -translate-x-full transition-transform ease-in-out duration-300 z-30">
        <!-- Close button -->
        <button id="closeSidebar" class="text-white absolute top-4 right-4 focus:outline-none">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <!-- Sidebar Content -->
        <ul class="p-4">
            <li><a href="#" class="block text-white"><span class="font-bold">Back</span>End</a></li>
        </ul>
        <div class="border-t border-[#494e52] mx-2"></div>
        <ul class="p-4">
            <li><a href="{{ route('dashboard.index') }}" class="block mb-1 text-white py-2 px-4 rounded-md bg-blue-500"><i class="fa-solid fa-gauge-high mr-1"></i> Dashboard</a></li>
            <li><a href="{{ route('profiles.index') }}" class="block mb-1 text-white py-2 px-4 rounded-md hover:bg-[#494e52]"><i class="fa-solid fa-user mr-1"></i> Profile</a></li>
        </ul>
    </div>

    <div class="relative">
        <div id="iconToggle" class="absolute inset-0 w-14 lg:w-16 hidden lg:block z-20">
            <div class="h-screen fixed bg-[#343a40] ">
                <div class="border-t border-[#494e52]"></div>
                <ul class="py-4 px-3">
                    <li><a href="{{ route('dashboard.index') }}" class="block mb-1 text-white py-2 px-3 rounded-md bg-blue-500"><i class="fa-solid fa-gauge-high"></i></a></li>
                    <li><a href="{{ route('profiles.index') }}" class="block mb-1 text-white py-2 px-3 rounded-md hover:bg-[#494e52]"><i class="fa-solid fa-user"></i></a></li>
                </ul>
            </div>
        </div>

        <!-- Page Content -->
        <div id="content" class="ml-0 p-8 transition-transform ease-in-out duration-300">
            <div id="marginToggle" class="lg:ml-16 z-10">
                <!-- Your page content goes here -->
                @yield('content')
            </div>
        </div>

    </div>

    <footer class="mt-auto text-right bg-white text-[#8690a6] p-4 border-t border-[#dee2e6]">
        <p>&copy; 2024 <a href="https://github.com/MatthewAlexanderA" target="_blank" class="font-bold">Matthew Alexander</a>. All rights reserved.</p>
    </footer>

    <!-- JavaScript to toggle sidebar -->
    <script>
        const toggleSidebarBtn = document.getElementById('toggleSidebar');
        const closeSidebarBtn = document.getElementById('closeSidebar');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const margin = document.getElementById('marginToggle');
        // const icon = document.getElementById('iconToggle');

        toggleSidebarBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            content.classList.toggle('lg:ml-64');
            margin.classList.remove('lg:ml-16');
            // icon.classList.remove('lg:block');
        });

        closeSidebarBtn.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            content.classList.remove('lg:ml-64');
            margin.classList.add('lg:ml-16');
            // icon.classList.add('lg:block');
        });

    </script>

    {{-- Dropdown --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownButton = document.getElementById('dropdown-button');
            const dropdownMenu = document.getElementById('dropdown-menu');

            dropdownButton.addEventListener('click', function () {
                dropdownMenu.classList.toggle('hidden');
            });

            // Close the dropdown when clicking outside
            document.addEventListener('click', function (event) {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>

    {{-- DataTables --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                responsive: true
            });
        });

    </script>

</body>

</html>
