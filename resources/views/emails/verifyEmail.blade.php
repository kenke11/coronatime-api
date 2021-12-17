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

    <h2>{{ucwords($user->username)}}, welcome to coronatime!</h2>

    <p>
        Click here to verify your email.
    </p>

    <a href="{{route('verified-email', $user->email_verified_token)}}" class="text-green-500 hover:text-green-600 px-5 py-3 border-green-600 transition duration-150">Verify email</a>
</body>
</html>
