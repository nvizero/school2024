<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name','LSAPP')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('css')
</head>
<body>
        <form action="{{ route('auth.signOut') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">登出</button>
        </form>

        <div class="container">
           @yield('content')
        </div>

       @yield('js')
</body>

