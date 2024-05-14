@php
$dashboardLink = (auth()->user()->role == 'admin') ? '/admin' : ((auth()->user()->role == 'lecturer') ? '/lecturer' : '/');
@endphp
<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <div x-data="{ open: false }" class="sm:hidden">
                    <button x-on:click="open = !open" data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    <div x-show="open" class="absolute left-0 mt-2.5 w-64 h-screen bg-white">
                        @include("partials._sidebar")
                    </div>
                </div>
                <a href="{{$dashboardLink}}" class="flex ml-2 md:mr-24">
                    <svg class="w-8 h-8 flex-shrink-0 w-6 h-6 text-white transition duration-75 mr-3" viewBox="0 0 29 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.7146 0.733953C16.71 0.250707 15.612 0 14.5 0C13.3879 0 12.2899 0.250707 11.2853 0.733953L1.58331 5.34362C0.0231012 6.08422 -0.38435 8.17525 0.362402 9.61972V16.8979C0.362402 17.1902 0.476978 17.4705 0.680925 17.6772C0.884871 17.8839 1.16148 18 1.44991 18C1.73833 18 2.01494 17.8839 2.21889 17.6772C2.42283 17.4705 2.53741 17.1902 2.53741 16.8979V11.2729L11.2853 15.4285C12.2899 15.9117 13.3879 16.1624 14.5 16.1624C15.612 16.1624 16.71 15.9117 17.7146 15.4285L27.4166 10.8188C29.5278 9.81663 29.5278 6.34579 27.4166 5.34362L17.7146 0.733953Z" fill="#15ACD9" />
                        <path d="M4 15V20.0476C4 21.419 4.7545 22.7034 6.0775 23.3673C8.281 24.4762 11.806 26 14.5 26C17.194 26 20.719 24.4748 22.9225 23.3687C24.2455 22.7034 25 21.419 25 20.049V15L18.781 17.6449C17.4428 18.2195 15.9806 18.5176 14.5 18.5176C13.0194 18.5176 11.5572 18.2195 10.219 17.6449L4 15Z" fill="#15ACD9" />
                    </svg>


                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">ClassMonitor</span>
                </a>
            </div>
            <div class="w-full flex items-center justify-end md:justify-between px-3">
                <form class="hidden md:block">
                    <label for="search" class="text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative w-80">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="search" class="w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-sky-400 sm:text-sm sm:leading-6  pl-10" placeholder="Search...">

                        <div id="display-search" class="bg-white absolute w-80 top-10 left-1/2 transform -translate-x-1/2 px-3 py-2 z-50 rounded-lg shadow-sm hidden">
                            <ul id="results" class="w-full space-y-2 divide-y divide-gray-600">
                            </ul>
                        </div>
                    </div>
                </form>
                <div class="flex items-center">
                    <img class="w-8 h-8 rounded-full" src={{asset("avatar.png")}} alt="user photo">
                    <span class="ml-3 text-black">{{auth()->user()->contacts->firstName}}</span>
                </div>
            </div>
        </div>
    </div>
</nav>