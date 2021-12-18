<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                        <h1 class="text-xl font-semibold">Confirmation email</h1>
                        <p class="text-sm">click this button to verify your email</p>
                    </div>
                    <div class="text-center mt-12">
                        <a
                            href="{{route('verified-email', $user->email_verified_token)}}"
                            class="bg-green-500 uppercase text-white font-semibold hover:bg-green-600 px-24 py-5 border-green-600 transition duration-150 rounded-xl cursor-pointer"
                        >VERIFY EMAIL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
