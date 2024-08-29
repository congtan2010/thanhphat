<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="image/logo.png" type="image/gif" sizes="16x16">
    <title>Thành Phát</title>
    @vite('resources/css/admin.css')
</head>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<body class="w-full h-auto lg:h-screen bg-sitebg">
    <div class="antialiased">
        <!-- Navbar -->
        {{-- <nav class="bg-white shadow-sm px-4 py-1 fixed left-0 right-0 top-0 z-50">
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex justify-start items-center">
                    <button aria-controls="drawer-navigation"
                        class="p-2 mr-2 text-acent1 rounded-lg cursor-pointer lg:hidden hover:bg-bgLight focus:bg-bgLight focus:ring-2 focus:ring-acent1">
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Toggle sidebar</span>
                    </button>

                    <!-- Logo -->
                    <a href="/" class="flex items-center justify-between mr-4">
                        <img id='logo' onclick="topFunction()" class=" object-cover   h-[90px]  "
                            src="{{ asset('image/logo.png') }}">

                    </a>

                    <!-- Tab Name -->

                </div>

                <!-- Institute Name -->
                <div class="hidden lg:inline">
                    <h1 class="text-xl md:text-3xl lg:text-5xl font-medium text-primary">Nhà xe Tân Minh Hà</h1>
                </div>

                <!-- User Profile -->
                <button type="button" class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0   "
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div class="hidden z-50 my-4 w-56 text-base list-none bg-white divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 rounded-xl"
                    id="dropdown">

                    <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm hover:bg-bgLight">My profile</a>
                        </li>

                    </ul>

                    <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
                        <li>
                            <a href="#" class="block py-2 px-4 text-sm hover:bg-bgLight">Log out</a>
                        </li>
                    </ul>
                </div>
                <!-- End of the user profile -->
            </div>

        </nav> --}}
        <!-- End of the Navbar -->

        <!-- Sidebar -->
        <aside
            class="scrollbar fixed pt-10 left-0 z-40 w-[260px] lg:w-56 h-screen top-10 transition-transform -translate-x-full bg-white border-r border-gray-200 lg:translate-x-0"
            aria-label="Sidenav" id="drawer-navigation">

            <!-- Menu (It's for Lablet and Desktop) -->
            <ul class="hidden lg:inline space-y-0.5">
                <li>
                    <a href="http://127.0.0.1:8000/admin"
                        class="flex items-center p-2 w-full text-base font-medium text-primary rounded-lg transition duration-75 group hover:bg-acent1">
                        <i
                            class="fa-solid fa-chalkboard-user text-lg text-acent1 transition duration-75 group-hover:text-white"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Thống kê</span>
                    </a>

                </li>
                <li>
                    <a href="http://127.0.0.1:8000/admin/quan-ly-ve-xe"
                        class="flex items-center p-2 w-full text-base font-medium text-primary rounded-lg transition duration-75 group hover:bg-acent1">
                        <i
                            class="fa-solid fa-chalkboard-user text-lg text-acent1 transition duration-75 group-hover:text-white"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Quản lý vé xe</span>
                    </a>
                </li>

                <li>
                    <a href="http://127.0.0.1:8000/admin/quan-ly-xe" type="button"
                        class="flex items-center p-2 w-full text-base font-medium text-primary rounded-lg transition duration-75 group hover:bg-acent1">
                        <i
                            class="fa-solid fa-clipboard-user text-lg text-acent1 transition duration-75 group-hover:text-white"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Quản lý xe</span>
                    </a>
                </li>

                <li>
                    <a href="http://127.0.0.1:8000/admin/quan-ly-hang-hoa"
                        class="flex items-center p-2 w-full text-base font-medium text-primary rounded-lg transition duration-75 group hover:bg-acent1">
                        <i
                            class="fa-solid fa-file-pen text-lg text-acent1 transition duration-75 group-hover:text-white"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Quản lý hàng hóa</span>
                    </a>
                </li>
                <li>
                    <a href="http://127.0.0.1:8000/admin/quan-ly-lo-trinh"
                        class="flex items-center p-2 text-base font-medium text-primary rounded-lg hover:bg-acent1 group transition duration-75">
                        <i
                            class="fa-solid fa-book text-lg text-acent1 group-hover:text-white transition duration-75"></i>
                        <span class="ml-3">Quản lý lộ trình</span>
                    </a>
                </li>
                <li>
                    <a href="http://127.0.0.1:8000/admin/quan-ly-nguoi-dung"
                        class="flex items-center p-2 text-base font-medium text-primary rounded-lg hover:bg-acent1 group transition duration-75">
                        <i
                            class="fa-solid fa-book text-lg text-acent1 group-hover:text-white transition duration-75"></i>
                        <span class="ml-3">Quản lý người dùng</span>
                    </a>
                </li>


            </ul>
        </aside>
        <!-- End of the Sidebar -->
    </div>
    <section class="pl-[260px] pt-[150px] "> @yield('content')</section>
    <!-- Site Script File -->

    <!-- Flowbite Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#btnStatistical').click(function() {
                $('#targetBtnStatistical').toggle();
            });
        });
    </script>
</body>

</html>
