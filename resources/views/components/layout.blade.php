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
    <title>Attendify</title>
</head>

<body>
    @include("partials._navbar")
    <main>
        <div class="hidden md:block fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700">
            @include("partials._sidebar")
        </div>
        <div class="p-4 sm:ml-64 bg-gray-100">
            <div class="p-4 rounded-lg dark:border-gray-700 mt-14">
                {{$slot}}
            </div>
        </div>
    </main>
    <x-flash-message />
    @stack('scripts')
</body>

</html>