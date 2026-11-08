<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Warhammer 40,000')</title>

    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="img-fluid" src="/storage/laravel/res/40k_Logo_Colour_1.webp" alt="Warhammer" height="40">
                Warhammer 40,000
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <button id="btn-share" type="button" class="btn btn-outline-info">
                            <i class="fas fa-share-alt"></i>  Поделиться
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    

    <main>    
        <!-------------------------->
        <div class="container mt-5 pt-5 mb-5">
        @yield('content')
        <!-------------------------->
    </main>

    <!-- Footer -->
    <footer class="bg-dark bd-footer text-white text-center pt-3 mt-auto ">
        <p>Ермолаев Константин Дмитриевич {{$websiteDate->date}}</p>
        <div>
            <img class="social-media-icon img-fluid" src="/storage/laravel/res/telegram-icon-free-png-3410861026.png" alt="tg">
            <img class="social-media-icon img-fluid" src="/storage/laravel/res/youtube-icon-for-web-design-free-png-1319777305.png" alt="yt">
        </div>
    </footer>

    @stack('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>