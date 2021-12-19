<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="min-h-screen flex flex-col ">
    <div class="flex justify-center mt-12">
        <img
            class="w-7/12"
            src="{{asset('images/LandingWorldwide.png')}}" alt="">
    </div>
    <div>
        <div class="flex justify-center mt-12">
            <div>
                <div class="text-center flex flex-col justify-center">
                    <h1 class="text-xl font-semibold">Recover password</h1>
                    <p class="text-sm">click this button to recover a password</p>
                </div>
                <div class="text-center mt-12">
                    <a
                        href="{{$url}}"
                        class="bg-green-500 uppercase text-white font-semibold hover:bg-green-600 px-24 py-5 border-green-600 transition duration-150 rounded-xl cursor-pointer"
                    >RECOVER PASSWORD</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
