<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ $header }} - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <h2 class="text-xl font-semibold leading-tight text-gray-800">
                        {{ $header }}
                    </h2>
                </div>
            </header>
        @endif

        <!-- Page Content -->

        <div class="py-6">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        <i class="fa fa-check"></i>
                        {{ session('success') }}
                    </div>
                @endif

                {{ $slot }}
            </div>
        </div>
    </div>

    @stack('modals')
    @isset($js)
        {{ $js }}
    @endisset
    @livewireScripts
</body>

</html>
