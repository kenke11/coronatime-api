<!doctype html>
<html lang="en" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="{{assert('images/icon.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/icon.png')}}">
    <title>Coronatime</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles
</head>
<body>
    <div
        class="min-h-full"
    >
        {{$slot}}
    </div>

    @if(session('success'))
        <x-success-notification message="{{session('success')}}"/>
    @endif

    @if(session('error'))
        <x-error-notification message="{{session('error')}}"/>
    @endif

    @if(session('info'))
        <x-info-notification message="{{session('info')}}"/>
    @endif

    @livewireScripts
</body>
</html>
