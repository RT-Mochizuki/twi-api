<DOCTYPE HTML>
<html lang="ja" class="bg-blue-400">
<head>
<meta charset="UTF-8">
<title>@yield('title')</title>
<meta name="description" itemprop="description" content="@yield('description')">
<meta name="keywords" itemprop="keywords" content="@yield('keywords')">
<link href="{{ asset('/css/app.css')}}" rel="stylesheet">
@yield('pageCss')
</head>
<body>
 
@yield('header')
 
<div class="contents">
    <!-- コンテンツ -->
    <div class="main">
        @yield('content')
    </div>

</div>
 
@yield('footer')
</body>
</html>