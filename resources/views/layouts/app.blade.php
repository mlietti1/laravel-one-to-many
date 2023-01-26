<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Boolpress @yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css' integrity='sha512-FA9cIbtlP61W0PRtX36P6CGRy0vZs0C2Uw26Q1cMmj3xwhftftymr0sj8/YeezDnRwL9wtWw8ZwtCiTDXlXGjQ==' crossorigin='anonymous'/>
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

</head>

<body>
    <div id="app">


        @include('admin.partials.header')


        <div class="container-fluid main-wrapper">
            <div class="row h-100">
                @auth
                    <div class="col-2 h-100 bg-secondary">
                        @include('admin.partials.aside')
                    </div>
                @endauth
                <div class="overflow-auto h-100 col-10">
                    <main>
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>



    </div>
</body>

</html>
