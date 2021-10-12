<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>MBTLCombos</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="MBTLCombosは、MELTY BLOOD: TYPE LUMINA（メルブラ）のコンボを簡単に検索、管理が出来るファンサイトです。" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta property="og:site_name" content="MBTLCombos" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
        <script src="https://kit.fontawesome.com/8c73468194.js" crossorigin="anonymous"></script>
        <meta name="msapplication-square70x70logo" content="/site-tile-70x70.png">
        <meta name="msapplication-square150x150logo" content="/site-tile-150x150.png">
        <meta name="msapplication-wide310x150logo" content="/site-tile-310x150.png">
        <meta name="msapplication-square310x310logo" content="/site-tile-310x310.png">
        <meta name="msapplication-TileColor" content="#0078d7">
        <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="/favicon.ico">
        <link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico">
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="36x36" href="/android-chrome-36x36.png">
        <link rel="icon" type="image/png" sizes="48x48" href="/android-chrome-48x48.png">
        <link rel="icon" type="image/png" sizes="72x72" href="/android-chrome-72x72.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/android-chrome-96x96.png">
        <link rel="icon" type="image/png" sizes="128x128" href="/android-chrome-128x128.png">
        <link rel="icon" type="image/png" sizes="144x144" href="/android-chrome-144x144.png">
        <link rel="icon" type="image/png" sizes="152x152" href="/android-chrome-152x152.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
        <link rel="icon" type="image/png" sizes="256x256" href="/android-chrome-256x256.png">
        <link rel="icon" type="image/png" sizes="384x384" href="/android-chrome-384x384.png">
        <link rel="icon" type="image/png" sizes="512x512" href="/android-chrome-512x512.png">
        <link rel="icon" type="image/png" sizes="36x36" href="/icon-36x36.png">
        <link rel="icon" type="image/png" sizes="48x48" href="/icon-48x48.png">
        <link rel="icon" type="image/png" sizes="72x72" href="/icon-72x72.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/icon-96x96.png">
        <link rel="icon" type="image/png" sizes="128x128" href="/icon-128x128.png">
        <link rel="icon" type="image/png" sizes="144x144" href="/icon-144x144.png">
        <link rel="icon" type="image/png" sizes="152x152" href="/icon-152x152.png">
        <link rel="icon" type="image/png" sizes="160x160" href="/icon-160x160.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/icon-192x192.png">
        <link rel="icon" type="image/png" sizes="196x196" href="/icon-196x196.png">
        <link rel="icon" type="image/png" sizes="256x256" href="/icon-256x256.png">
        <link rel="icon" type="image/png" sizes="384x384" href="/icon-384x384.png">
        <link rel="icon" type="image/png" sizes="512x512" href="/icon-512x512.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/icon-16x16.png">
        <link rel="icon" type="image/png" sizes="24x24" href="/icon-24x24.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/icon-32x32.png">
        <link rel="manifest" href="/manifest.json">
        <script data-ad-client="ca-pub-8705074607112164" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8705074607112164"crossorigin="anonymous"></script>
        @stack('css')
    </head>

    <body>

        @include('commons.navbar')
        
        <div class="container">
            @include('commons.error_messages')
            
            @yield('content')
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    </body>
</html>