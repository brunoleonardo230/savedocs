<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SaveDocs') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('themes/vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/vendor/datatables/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/css/sb-admin-2.css') }}">

    </head>
    <body id="page-top">
        <div id="wrapper">
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    @include('layouts.navbar')

                    <div class="container-fluid">

                       
                    </div>
                </div>
            </div>
        </div>

        {{-- Bootstrap core JavaScript --}}
        <script src="{{ asset('themes/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('themes/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        {{-- Core plugin JavaScript --}}
        <script src="{{ asset('themes/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        {{-- Custom scripts for all pages --}}
        <script src="{{ asset('themes/js/sb-admin-2.min.js') }}"></script>
        {{-- Page level plugins --}}
        <script src="{{ asset('themes/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('themes/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>     
        
        <script src="{{ asset('themes/vendor/jquery-mask/jquery.mask.min.js') }}"></script>

        {{-- Scripts utilizados no formulário de usuários --}}
        <script src="{{ asset('js/user.js') }}"></script>

    @yield('scripts')

    </body>
</html>
