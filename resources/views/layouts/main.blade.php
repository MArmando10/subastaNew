<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="background: linear-gradient(90deg, #101623, #1b2640 100%);">
<head>
    @yield('header', View::make('layouts.header'))
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body @yield('body-config')>
    @yield('navigation', View::make('layouts.navigation'))
    @yield('content')
</body>
</html>