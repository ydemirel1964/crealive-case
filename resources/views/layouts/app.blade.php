<!doctype html>
<html lang="tr">

<head>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css?v=') . time() }}">
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('head')
</head>

<body>

    <header>
        <div class="container">
            <nav class="navbar navbar-light justify-content-between">
                <a href="/" class="navbar-brand">Crealive-Case</a>
                @if (Auth::user())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Çıkış Yap') }}
                        </x-dropdown-link>
                    </form>
                @else
                    <a href="/login">Giriş Yap</a>
                @endif
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>

    <script src="{{ URL::asset('js/main.js') }}"></script>
</body>

</html>
