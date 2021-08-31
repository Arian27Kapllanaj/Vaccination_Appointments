<head>
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="images/favicon.png" />

    <style>
        body {
            background: url(images/home.png);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            animation-name: background-move;
            animation-duration: 25s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
            overflow: hidden;
        }

        @keyframes background-move {
            0% {
                background-position: 0% 0%;
            }

            50% {
                background-position: 50% 100%;
            }

            100% {
                background-position: 0% 0%;
            }
        }

        #buttons {
            width: 40%;
            height: 50px;
        }

        .content {
            text-align: center;
            color: white;
            border: 2px solid white;
            padding: 50px;
            margin: 20px;
            background: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>
<div class="container">
    <br>
    <div class="content">
    <h2>Welcome!</h2>
        <img src="images/logo.png" alt="" width="300vm">
        <br><br>
        <p>This is a website to help citizens to book <br>an appointment to do their vaccination and <br>choose the vaccine type that they want.
            <br>It is a friendly user-interface webiste and very easy to navigate.<br>You can login or register, and book an appointment right now.
            <br>You can choose the place and the time to do the vaccine.
            <br>After confirmation from the Nurses, you can get the vaccination certification.<br>
            This website is builded with Laravel 8 and Bootstrap 5.
        </p>
        <br><br>
        @if (Route::has('login'))
        @auth
        <button type="button" class="btn btn-success" id="buttons"><a href="{{ url('/home') }}" style="color: white; text-decoration: none;">Home</a></button>
        @else
        <button type="button" class="btn btn-secondary" id="buttons"><a href="{{ route('login') }}" style="color: white; text-decoration: none;">Log in</a></button>
        @if (Route::has('register'))
        <button type="button" class="btn btn-primary" id="buttons"><a href="{{ route('register') }}" style="color: white; text-decoration: none;">Register</a></button>
        @endif
        @endauth
        @endif
    </div>
</div>