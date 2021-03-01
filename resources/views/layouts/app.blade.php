<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    <script>
        tinymce.init({
            // max_chars:370,
            selector:'textarea.content',
            // width: 900,
            // height: 300
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },

            //character limiter
            // function (ed) {
            //     var allowedKeys = [8, 37, 38, 39, 40, 46]; // backspace, delete and cursor keys
            //     ed.on('keydown', function (e) {
            //         if (allowedKeys.indexOf(e.keyCode) != -1) return true;
            //         if (tinymce_getContentLength() + 1 > this.settings.max_chars) {
            //             e.preventDefault();
            //             e.stopPropagation();
            //             return false;
            //         }
            //         return true;
            //     });
            //     ed.on('keyup', function (e) {
            //         tinymce_updateCharCounter(this, tinymce_getContentLength());
            //     });
            // },
            // init_instance_callback: function () { // initialize counter div
            //     $('#' + this.id).prev().append('<div class="char_count" style="text-align:right"></div>');
            //     tinymce_updateCharCounter(this, tinymce_getContentLength());
            // },
            // paste_preprocess: function (plugin, args) {
            //     var editor = tinymce.get(tinymce.activeEditor.id);
            //     var len = editor.contentDocument.body.innerText.length;
            //     var text = $(args.content).text();
            //     if (len + text.length > editor.settings.max_chars) {
            //         alert('Pasting this exceeds the maximum allowed number of ' + editor.settings.max_chars + ' characters.');
            //         args.content = '';
            //     } else {
            //         tinymce_updateCharCounter(editor, len + text.length);
            //     }
            // },
            
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ],
            // image_title: true,
            // automatic_uploads: true,
            // images_upload_url: '/upload',
            // file_picker_types: 'image',
            // file_picker_callback: function(cb, value, meta) {
            //     var input = document.createElement('input');
            //     input.setAttribute('type', 'file');
            //     input.setAttribute('accept', 'image/*');
            //     input.onchange = function() {
            //         var file = this.files[0];

            //         var reader = new FileReader();
            //         reader.readAsDataURL(file);
            //         reader.onload = function () {
            //             var id = 'blobid' + (new Date()).getTime();
            //             var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            //             var base64 = reader.result.split(',')[1];
            //             var blobInfo = blobCache.create(id, file, base64);
            //             blobCache.add(blobInfo);
            //             cb(blobInfo.blobUri(), { title: file.name });
            //         };
            //     };
            //     input.click();
            // }
        });
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('article*') ? 'active' : '' }}" href="{{route('articles.index')}}">Article</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('project*') ? 'active' : '' }}" href="{{route('projects.index')}}">Portfolio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="">User</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
