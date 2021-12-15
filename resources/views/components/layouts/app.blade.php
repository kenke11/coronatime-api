<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div class="min-h-full">
        {{$slot}}
    </div>


    @if(session('success'))
        <x-success-notification message="{{session('success')}}"/>
    @endif

    <script src="{{asset('js/app.js')}}" ></script>
</body>
</html>
