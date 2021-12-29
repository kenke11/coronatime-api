<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        .container{
            min-height: 100vh;
        }

        .img-box{
            width: 50%;
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
                    <h1 style="margin-top: 16px; font-size: 25px">Recover password</h1>
                    <p style="margin-top: 16px; margin-bottom: 59px">click this button to recover a password</p>
                </div>
                <div style="margin: 0 auto; width: 20%;">
                    <a  href="{{route('password.reset', $token)}}" class="button" style="background: #0FBA68; padding: 19px 33%; border-radius: 10px; color: white; font-weight: bold; text-decoration: none; margin: 0 auto">
                        <span>RECOVER<span style="color: #0FBA68">_</span>PASSWORD</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
