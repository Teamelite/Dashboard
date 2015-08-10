<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title', 'TeamElite')</title>

    {!! Html::style("css/bootstrap.css") !!}
    {!! Html::style("css/font-awesome.css") !!}
    {!! Html::style("css/style.css") !!}

</head>
<body>

@yield('header', null)
@yield('navigation', null)
@yield('content', null)
@yield('footer', null)

{!! Html::script("js/jquery-1.11.1.js") !!}
{!! Html::script("js/bootstrap.js") !!}

</body>
</html>
