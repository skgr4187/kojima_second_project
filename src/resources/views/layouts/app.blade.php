{{-- ヘッダー --}}
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>COACHETECH</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header-inner">
            <a href="/" >
                <img src="storage/images/logo.svg" alt="coachtech" class="header-logo">
            </a>
            <form action="{{ route('search') }}" method="get">
                <input type="text" name="query" placeholder="なにをお探しですか？"  value="{{ request('query') }}" class="search_form"/>
            </form>
            <ul class="header-link">
                {{-- @if (Auth::check()) --}}
                <li class="header-link-item">
                    <form action="/logout" method="post">
                    @csrf
                        <input class="logout-btn" type="submit" value="ログアウト">
                    </form>
                </li>
                <li class="header-link-item">
                    <form action="/mypage" method="get">
                    @csrf
                        <input class="mypage-btn" type="submit" value="マイページ">
                    </form>
                </li>
                <li class="header-link-item">
                    <form action="/sell" method="get">
                    @csrf
                        <input class="sell-btn" type="submit" value="出品">
                    </form>
                </li>
                {{-- @endif --}}
            </ul>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>
