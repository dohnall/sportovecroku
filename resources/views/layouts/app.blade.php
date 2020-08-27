<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sportovec roku MČ Praha 15</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/lightbox.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @yield('content')
        <section class="archive">
            <h2><img src="/images/nadpis_archiv.svg" width="260" alt="Archiv" class="img-fluid"></h2>
            <ul>
                <li><a href="/archive/2019" @if(Request::is('archive/2019')) class="selected"@endif>2019</a></li>
            </ul>
        </section>
        <section class="footer">
            <img src="/images/logo_mc_praha_15.svg" alt="Logo MČ Praha 15">
            <p>Pořadatelem ankety Sportovec roku je MČ Praha 15.</p>
            <p>Technickou část ankety Sportovec roku zajišťuje společnost MOO Design s.r.o.</p>
            <p>„Všichni nominovaní jsou občany MČ Praha 15 nebo sportují ve sportovních klubech v MČ Praze 15 a s nominací vyjádřili svůj souhlas.“</p>
        </section>
    </div>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-152013930-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){ dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'UA-152013930-1');
    </script>
</body>
</html>
