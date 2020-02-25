<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ShurForo - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js')}}" defer></script>

    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea.tiny",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,

            image_title: true,
            automatic_uploads: true,
            images_upload_url: '{{url("/post/uploadimage")}}',
            images_upload_url: {
                "_token": $("meta[name='csrf-token']").attr("content")
            },
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {

                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        };

        tinymce.init(editor_config);
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/mycss.css')}}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar-expand-lg navbar navbar-dark bg-dark topfix">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="{{ url('/')}}">ShurBlog</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/')}}">Home <span class="sr-only"></span></a>
                    </li>
                    @if (Route::has('login'))
                        @auth

                            @if( \Illuminate\Support\Facades\Auth::user()->type === 'Editor' || \Illuminate\Support\Facades\Auth::user()->type === 'Administrador' )

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Administrar Posts
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('/newpost')}}">Crear Post</a>
                                        <a class="dropdown-item" href="{{ url('/viewmypost')}}">Ver Mis Posts</a>
                                    </div>
                                </li>


                            @endif

                            @if( \Illuminate\Support\Facades\Auth::user()->type === 'Administrador' )
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Administracion
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('/viewposts')}}">Posts</a>
                                        <a class="dropdown-item" href="{{ url('/viewusers')}}">Usuarios</a>
                                    </div>
                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ \Illuminate\Support\Facades\Auth::user()->user }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/myuser')}}">Mi perfil</a>
                                </div>
                            </li>

                        @endauth
                    @endif

                </ul>
                @if (Route::has('login'))
                    @auth
                        <form action="{{ url('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-success text-white my-2 my-sm-0">Cerrar Sesion</button>
                        </form>
                    @else
                        <a href="{{ url('login')}}" class="btn btn-outline-success text-white my-2 my-sm-0" type="submit">Iniciar Sesion</a>
                    @endauth
                @endif

            </div>
        </nav>

        <main class="mt-5 mb-5 pb-5">
            <div class="container mt-5 pt-5">
                @yield('content')
            </div>
        </main>

        <div class=" bg-dark footer text-center pt-3 pb-2">
            <div class="container">
                <p class="text-white">
                    &copy; {{ now()->year }} Antonio Escobar Rueda
                </p>
            </div>
        </div>
    </div>
</body>
</html>
