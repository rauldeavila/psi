<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'CEFUS - 14122 - Raul') }}</title>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Moderna:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header class="header">
            <div class="header-content">
                <div class="header-left">
                    <img src="{{ asset('images/x_caixa.png') }}" alt="X Caixa" class="header-logo">
                    <span class="header-title">
                        <strong>CEFUS</strong> PSI 14122 - Raul de Avila Jr.
                    </span>
                </div>
                <nav class="header-nav">
                    <a href="{{ route('consulta.index') }}">Consulta</a>
                    <a href="{{ route('cadastro.create') }}">Cadastro</a>
                </nav>
            </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    @yield('scripts')
    </div>
</body>
</html>
