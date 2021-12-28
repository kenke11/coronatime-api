<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .container{
            min-height: 100vh;
        }

        .img-box{
            width: 75%;
            margin: 0 auto;
        }

        .img-box img{
            margin-top: 20px;
            width: 100%;
        }

        .link-box{

        }

        .link-header{
            margin-top: 58px;
        }

        .link-header p, .link-header h1{
            width: fit-content;
            margin: 0 auto;
        }

        .link-footer{
            width: 60%;
            margin: 0 auto;
        }

        .button{
            margin: 0 auto;
            background: #0FBA68;
        }
        .button:hover{
            background: #0f9a56;
        }
        .button span{
            margin: 0 auto;
            color: white;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="img-box">
            <img
                src="{{asset('images/LandingWorldwide.png')}}" alt="">
        </div>
        <div>
            <div class="link-box">
                <div>
                    <div class="link-header">
                        <h1 style="margin-top: 16px">Confirmation email</h1>
                        <p style="margin-top: 16px">click this button to verify your email</p>
                    </div>
                    <div class="link-footer">
                        <a
                            style="padding-top: 19px; padding-bottom: 19px; width: 100%; margin-top: 59px; "
                            href="{{route('verified-email', $user->email_verified_token)}}"
                            class="button"
                        ><span style="margin: 0 auto;">VERIFY EMAIL</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
