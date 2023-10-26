<!DOCTYPE html>
<html>

<head>
    <title>Crealive-Case Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css?v=') . time() }}">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-light justify-content-between">
                <a href="/" class="navbar-brand">Crealive-Case</a>
                <a href="/admin/articles"> Yazılar</a>
                <a href="/admin/categories"> Kategoriler</a>
                <a href="/admin/users"> Üyeler</a>
                <strong>{{ Auth::user()->name }}</strong>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Çıkış Yap') }}
                    </x-dropdown-link>
                </form>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>
