<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>APP Spill Oil Report FOD - 5</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">


    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">

    @include('sweetalert::alert')

    <div class="min-h-screen bg-gray-100">

        <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start rtl:justify-end">
                        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                            aria-controls="logo-sidebar" type="button"
                            class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                                </path>
                            </svg>
                        </button>
                        <a href="/" class="flex ms-2 md:me-24">
                            <span class="self-center text-lg font-semibold whitespace-nowrap dark:text-white">APP Spill
                                Oil Report FOD - 5</span>
                        </a>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center ms-3">
                            <div>
                                <button type="button"
                                    class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                    aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-full h-10" src="/logo-pertamina.png" alt="user photo">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="flex">
            <aside id="logo-sidebar"
                class="fixed top-16 left-0 overflow-hidden bg-[#214b8e] z-40 w-64 h-screen pt-5 transition-transform -translate-x-full border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
                aria-label="Sidebar">
                <div class="h-full bg-[#214b8e] rounded-r-lg overflow-hidden px-3 pb-4 overflow-y-auto text-white">
                    <ul class="space-y-2 font-medium">
                        <li
                            class="{{ request()->routeIs('dashboard') ? 'bg-sky-600 rounded-lg' : 'bg-[#214b8e] rounded-lg' }}">
                            <a href="{{ route('dashboard') }}"
                                class="flex items-center p-2 text-white rounded-lg dark:text-white group">
                                <svg class="w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 22 21">
                                    <path
                                        d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                    <path
                                        d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                                </svg>
                                <span class="ms-3">Dashboard</span>
                            </a>
                        </li>
                        <li
                            class="{{ request()->routeIs('names.*') ? 'bg-sky-600 rounded-lg' : 'bg-[#214b8e] rounded-lg' }}">
                            <a href="{{ route('names.index') }}"
                                class="flex items-center p-2 text-white rounded-lg dark:text-white group">

                                <svg class="flex-shrink-0 w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 18">
                                    <path
                                        d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm-1.391 7.361.707-3.535a3 3 0 0 1 .82-1.533L7.929 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h4.259a2.975 2.975 0 0 1-.15-1.639ZM8.05 17.95a1 1 0 0 1-.981-1.2l.708-3.536a1 1 0 0 1 .274-.511l6.363-6.364a3.007 3.007 0 0 1 4.243 0 3.007 3.007 0 0 1 0 4.243l-6.365 6.363a1 1 0 0 1-.511.274l-3.536.708a1.07 1.07 0 0 1-.195.023Z" />
                                </svg>

                                <span class="flex-1 ms-3 whitespace-nowrap">Name</span>
                            </a>
                        </li>
                        <li
                            class="{{ request()->routeIs('wells.*') ? 'bg-sky-600 rounded-lg' : 'bg-[#214b8e] rounded-lg' }}">
                            <a href="{{ route('wells.index') }}"
                                class="flex items-center p-2 text-white rounded-lg dark:text-white group">

                                <svg class="flex-shrink-0 w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 18 18">
                                    <path
                                        d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z" />
                                </svg>

                                <span class="flex-1 ms-3 whitespace-nowrap">Wells</span>
                            </a>
                        </li>
                        <li
                            class="{{ request()->routeIs('teams.*') ? 'bg-sky-600 rounded-lg' : 'bg-[#214b8e] rounded-lg' }}">
                            <a href="{{ route('teams.index') }}"
                                class="flex items-center p-2 text-white rounded-lg dark:text-white group">


                                <svg class="flex-shrink-0 w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                                    <path
                                        d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                                    <path
                                        d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                                </svg>

                                <span class="flex-1 ms-3 whitespace-nowrap">Teams</span>
                            </a>
                        </li>
                        <li
                            class="{{ request()->routeIs('reports.*') ? 'bg-sky-600 rounded-lg' : 'bg-[#214b8e] rounded-lg' }}">
                            <a href="{{ route('reports.index') }}"
                                class="flex items-center p-2 text-white rounded-lg dark:text-white group">

                                <svg class="flex-shrink-0 w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 18 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 1v14h16M4 10l3-4 4 4 5-5m0 0h-3.207M16 5v3.207" />
                                </svg>


                                <span class="flex-1 ms-3 whitespace-nowrap">Report</span>
                            </a>
                        </li>
                        <li
                            class="{{ request()->routeIs('exports.index') ? 'bg-sky-600 rounded-lg' : 'bg-[#214b8e] rounded-lg' }}">
                            <a href="{{ route('exports.index') }}"
                                class="flex items-center p-2 text-white rounded-lg dark:text-white group">

                                <svg class="flex-shrink-0 w-5 h-5 text-gray-300 transition duration-75 group-hover:text-gray-100"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 16 20">
                                    <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                                    <path
                                        d="M13.768 15.475a1 1 0 0 1-1.414-1.414L13.414 13H6a1 1 0 0 1 0-2h7.414l-1.06-1.061a1 1 0 1 1 1.414-1.414L16 10.757V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2H14a2 2 0 0 0 2-2v-4.757l-2.232 2.232Z" />
                                </svg>

                                <span class="flex-1 ms-3 whitespace-nowrap">Export</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

            <div class="flex-1 ml-64">
                <div class="py-20 mt-2">
                    <div class="max-w-7xl sm:px-6 lg:px-8">
                        <!-- Content Slot -->
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
