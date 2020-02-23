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
            <div class="pull-right" style="margin-top:10px;">
                <div class="col-md-10 col-md-offset-1 pull-right">
                    <img class="img-error" src="{{ url('../'.Storage::url("app/public/oh.png")) }}" />
                    <h2>403 No Autorizado</h2>
                    <div class="error-actions">
                        <a href="{{ url('/')}}" class="btn btn-primary btn-lg"> <span class="glyphicon glyphicon-arrow-left"></span> Back Home </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>