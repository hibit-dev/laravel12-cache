<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <title>{{config('app.name')}} - @yield('title', 'Some default title')</title>
</head>
<body>
    @yield('body')
</body>
</html>