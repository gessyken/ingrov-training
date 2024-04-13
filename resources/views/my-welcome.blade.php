<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <title>{{ config('app.name') }}</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="alert alert-info">
                    <div class="display-1 bg-blue-500 text-center">
                        Welcome in {{config('app.name')}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md text-center">
                <div class="btn btn-lg btn-link btn-primary">
                    <a href="{{ route('login') }}">
                        Login
                    </a>
                </div>

                <div class="btn btn-lg btn-link btn-primary">
                    <a href="{{ route('register') }}">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
