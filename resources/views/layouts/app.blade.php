<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
</head>
<body hold-transition skin-blue sidebar-mini>
    <div id="wrapper">
        {{-- Nav bar template --}}
        @include("layouts.partials.nav-bar")

        {{-- Side Bar template--}}
        @include("layouts.partials.side-bar")

        <div class="content-wrapper">
            <section class="content-header">
                @yield('content-header')
            </section>
            <section class="content">
                {{-- Body content --}}
                @yield('content')
            </section>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ elixir('js/app.js') }}"></script>
</body>
</html>
