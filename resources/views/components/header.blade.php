<header id="page-header"
    class="fixed top-0 z-30 flex items-center flex-none h-16 transition-all duration-300 ease-out bg-white shadow-sm end-0 start-0 dark:bg-gray-900 lg:ps-64"
    x-bind:class="{ 'lg:ps-64': isSidebarOpen }">
    <div class="flex justify-between w-full px-4 mx-auto max-w-7xl lg:px-8">
        <!-- Left Section -->
        <div class="flex items-center">
            <!-- Toggle Sidebar on Mobile -->
            <div class="me-2 lg:hidden">
                <button type="button"
                    class="inline-flex items-center justify-center gap-2 px-3 py-2 font-semibold leading-6 text-gray-800 bg-white border border-gray-300 rounded shadow-sm hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow focus:outline-none focus:ring focus:ring-gray-500/25 active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900"
                    x-on:click="isSidebarOpen = true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="inline-block w-5 h-5 hi-solid hi-menu-alt-1">
                        <path fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <!-- END Toggle Sidebar on Mobile -->

            <!-- Toggle Sidebar on Desktop -->
            <div class="hidden lg:block">
                <button type="button"
                    class="inline-flex items-center justify-center gap-2 px-3 py-2 font-semibold leading-6 text-gray-800 bg-white border border-gray-300 rounded shadow-sm hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow focus:outline-none focus:ring focus:ring-gray-500/25 active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900"
                    x-on:click="isSidebarOpen = !isSidebarOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="inline-block w-5 h-5 hi-solid hi-menu-alt-1">
                        <path fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <!-- END Toggle Sidebar on Desktop -->
        </div>
        <!-- END Left Section -->

        <!-- Main Section -->
        <div class="flex items-center">
            <!-- Search -->
            <div class="hidden sm:block">
                <form onsubmit="return false;">
                    <div class="relative">
                        <input
                            class="block py-2 text-sm leading-5 border border-gray-300 rounded w-96 pe-10 focus:border-blue-500 focus:ring focus:ring-blue-500/50 dark:border-gray-700 dark:bg-gray-800 dark:placeholder:text-gray-400 dark:focus:border-blue-400 dark:focus:ring-blue-400"
                            type="text" id="search" name="search" placeholder="Search.." />
                        <div
                            class="absolute inset-y-0 flex items-center justify-center w-10 my-px text-gray-300 rounded-r pointer-events-none end-0 me-px">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="w-5 h-5 hi-solid hi-magnifying-glass">
                                <path fill-rule="evenodd"
                                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Search -->

            <!-- Brand -->
            <a href="javascript:void(0)"
                class="inline-flex items-center gap-2 font-semibold text-blue-600 group hover:text-blue-600 sm:hidden">
                <svg class="inline-block w-6 h-6 hi-mini hi-briefcase -rotate-6" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.572.055 1.14.122 1.706.2C17.053 4.582 18 5.75 18 7.07v3.469c0 1.126-.694 2.191-1.83 2.54-1.952.599-4.024.921-6.17.921s-4.219-.322-6.17-.921C2.694 12.73 2 11.665 2 10.539V7.07c0-1.321.947-2.489 2.294-2.676A41.047 41.047 0 016 4.193V3.75zm6.5 0v.325a41.622 41.622 0 00-5 0V3.75c0-.69.56-1.25 1.25-1.25h2.5c.69 0 1.25.56 1.25 1.25zM10 10a1 1 0 00-1 1v.01a1 1 0 001 1h.01a1 1 0 001-1V11a1 1 0 00-1-1H10z"
                        clip-rule="evenodd" />
                    <path
                        d="M3 15.055v-.684c.126.053.255.1.39.142 2.092.642 4.313.987 6.61.987 2.297 0 4.518-.345 6.61-.987.135-.041.264-.089.39-.142v.684c0 1.347-.985 2.53-2.363 2.686a41.454 41.454 0 01-9.274 0C3.985 17.585 3 16.402 3 15.055z" />
                </svg>
            </a>
            <!-- END Brand -->
        </div>
        <!-- END Main Section -->

        <!-- Right Section -->
        <div class="flex items-center gap-2">
            @auth
            <!-- User Dropdown -->
            <div class="relative inline-block">
                <!-- Dropdown Toggle Button -->
                <button type="button"
                    class="inline-flex items-center justify-center px-3 py-2 text-sm font-semibold leading-5 text-gray-800 bg-white border border-gray-300 rounded shadow-sm hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow focus:outline-none focus:ring focus:ring-gray-500/25 active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900"
                    id="tk-dropdown-layouts-user" aria-haspopup="true" x-bind:aria-expanded="userDropdownOpen"
                    x-on:click="userDropdownOpen = true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="inline-block w-5 h-5 hi-solid hi-user-circle sm:hidden">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="hidden sm:inline">John</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="hidden w-5 h-5 opacity-50 hi-solid hi-chevron-down ms-1 sm:inline-block">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <!-- END Dropdown Toggle Button -->

                <!-- Dropdown -->
                <div x-cloak x-show="userDropdownOpen" x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-75"
                    x-on:click.outside="userDropdownOpen = false" role="menu" aria-labelledby="tk-dropdown-layouts-user"
                    class="absolute w-48 mt-2 rounded shadow-xl z-1 end-0 ltr:origin-top-right rtl:origin-top-left">
                    <div
                        class="bg-white divide-y divide-gray-100 rounded ring-1 ring-black/5 dark:divide-gray-700 dark:bg-gray-900 dark:ring-gray-700">
                        <div class="p-2 space-y-1">
                            <a role="menuitem" href="javascript:void(0)"
                                class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-600 rounded hover:bg-gray-100 hover:text-gray-700 focus:bg-gray-100 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100 dark:focus:bg-gray-800 dark:focus:text-gray-100">
                                <span>Settings</span>
                            </a>
                        </div>
                        <div class="p-2 space-y-1">
                            <form onsubmit="return false;">
                                <button type="submit" role="menuitem"
                                    class="flex items-center w-full gap-2 px-3 py-2 text-sm font-medium text-gray-600 rounded text-start hover:bg-gray-100 hover:text-gray-700 focus:bg-gray-100 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100 dark:focus:bg-gray-800 dark:focus:text-gray-100">
                                    <span>Sign out</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END Dropdown -->
            </div>
            <!-- END User Dropdown -->
            @endauth
            @guest
            <a href="{{ route('login') }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium border border-gray-500 rounded dark:text-white gap-x-2 focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                Login
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-log-in">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                    <polyline points="10 17 15 12 10 7" />
                    <line x1="15" x2="3" y1="12" y2="12" />
                </svg>
            </a>
            <a href="{{ route('register') }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 border border-transparent rounded gap-x-2 focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                Register
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-user-round">
                    <circle cx="12" cy="8" r="5" />
                    <path d="M20 21a8 8 0 0 0-16 0" />
                </svg>
            </a>
            @endguest
        </div>
        <!-- END Right Section -->
    </div>
</header>