<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Simple 404 error page - 404Pagefree.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/mycss.css')}}" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all" />
</head>
<body class="body-404">
<div class="container  bootstrap snippet">
    <div class="row">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="col-5 text-center">
                    <img class="img-error" src="{{ url('../'.Storage::url("app/public/oh.png")) }}" />
                    <h2 class="m-2">404 Not Found</h2class>
                    <h4 class="m-2 mb-4">Tah perdió??</h4>
                    <div class="error-actions">
                        <a href="{{ url('/')}}" class="btn btn-primary btn-lg"> <span class="glyphicon glyphicon-arrow-left"></span>Dale aquí</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>