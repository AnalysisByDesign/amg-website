<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    <meta name="author" content="Analyse my Golf">
    <meta name="description" content="Monitor, compare and improve your game.">

    <link rel="apple-touch-startup-image" href="/img/apple-startup.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-K55DD2');</script>
    <!-- End Google Tag Manager -->

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon" sizes="144x144" href="/ico/apple-touch-icon-144.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/ico/apple-touch-icon-114.png">
    <link rel="apple-touch-icon" sizes="72x72"   href="/ico/apple-touch-icon-72.png">
    <link rel="apple-touch-icon"                 href="/ico/apple-touch-icon-57.png">
    <link rel="shortcut icon"                    href="/ico/favicon.png">

    <!-- CSS -->
    <link href="{{ mix(Spark::usesRightToLeftTheme() ? 'css/app-rtl.css' : 'css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @stack('scripts')

    <!-- Global Spark Object -->
    <script>
        window.Spark = <?php echo json_encode(array_merge(Spark::scriptVariables(), [])); ?>;
    </script>
</head>

<body class="with-navbar">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K55DD2"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="amg-main-page">

        <div id="spark-app" v-cloak>
            <!-- Navigation -->
            @if (Auth::check())
                @include('spark::nav.user')
            @else
                @include('spark::nav.guest')
            @endif

            <!-- Main Content -->
            <main class="py-4">
                @yield('content')
            </main>

            <!-- Application Level Modals -->
            @if (Auth::check())
                @include('spark::modals.notifications')
                @include('spark::modals.support')
                @include('spark::modals.session-expired')
            @endif
        </div>

        </div>

    <footer class="mx-auto max-w-1000 p-2 bg-amg text-sm shadow-xl border-solid border-t border-color-600 leading-relaxed">
        <div class="float-right">
            <a href="https://facebook.com/AnalyseMyGolf" target="_blank">
                <img height="20px" src="/img/facebook.png" title="Analyse my Golf on Facebook">
            </a>
            <a href="https://twitter.com/AnalyseMyGolf" target="_blank">
                <img height="20px" src="/img/twitter.png" title="Analyse my Golf on Twitter">
            </a>
            <a href="https://instagram.com/AnalyseMyGolf" target="_blank">
                <img height="20px" src="/img/instagram.png" title="Analyse my Golf on Instagram">
            </a>
        </div>
        <div>
            <a class="text-white" href="/about">About AmG</a>
            <br>
            <a class="text-white" href="/terms">Terms of Use</a>
            <br>
            <a class="text-white" href="/privacy">Privacy Policy</a>
            <br>
            <a class="text-white" href="/status">Site Status</a>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="/js/sweetalert.min.js"></script>
</body>
</html>
