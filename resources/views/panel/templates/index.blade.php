<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SI-MONTOK</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('panel.templates.inc.style')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="wrapper">
        @include('panel.templates.inc.header')

        <div class="page-wrap">
            <div class="app-sidebar colored">
                @include('panel.templates.inc.sidebar_header')

                @include('panel.templates.inc.sidebar')
            </div>

            @yield('content')

            @include('panel.templates.inc.footer')
        </div>
    </div>

    @include('panel.templates.inc.quick_search')

    @include('panel.templates.inc.script')
</body>

</html>