<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/alpine.js') }}" defer></script>
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/moment.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/daterangepicker.min.js') }}" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-icons.js') }}" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/buttons.bootstrap5.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select.bootstrap5.css') }}" />
    <script src="{{ asset('js/chart.js')}}"></script>
    @vite('resources/js/app.js')
    <title>ClassMonitor</title>
</head>

<body>
    @include("partials._navbar")
    <main>
        <div class="hidden md:block fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700">
            @include("partials._sidebar")
        </div>
        <div class="sm:ml-64 bg-gray-100">
            <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
                {{$slot}}
            </div>
        </div>
    </main>
    <x-flash-message />
    <div class="relative z-[100] hidden" aria-labelledby="modal-title" id="modal-logout" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-20">
                        <div class="sm:flex sm:items-center sm:justify-center">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Are you sure you want to log out?</h3>
                                <div class="mt-2 text-center">
                                    <p class="text-sm text-gray-500">All unsaved data will be erased</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 justify-center">
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="inline-flex w-full justify-center rounded-md bg-[#15ACD9] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#43bce0] sm:ml-3 sm:w-24">
                                    Yes
                                </button>
                            </form>
                            <button onclick="logout()" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-[#BDBDBD] px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-[#cacaca] sm:mt-0 sm:w-24">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stack('scripts')
    <script>
        
        function logout() {
            const logout = document.getElementById("logout");
            const x = document.getElementById("modal-logout");
            if (x.className.indexOf("hidden") == -1) {
                x.className += " hidden";
            } else {
                x.className = x.className.replace(" hidden", "");
            }

        }
    </script>
</body>

</html>