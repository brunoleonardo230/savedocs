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
        

        {{-- Lib Stripe --}}
        <script src="https://js.stripe.com/v3/"></script>

        {{-- @livewireStyles --}}
    </head>
    <body id="page-top">
        <div id="wrapper">
            @include('layouts.navigation')

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    @include('layouts.navbar')

                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex mb-4">
                            <h1 class="h3 mb-0 text-gray-800"> {{ $header }} </h1>
                        </div>

                        <!-- Session Status -->
                        @include('components.session-flash')

                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('themes/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('themes/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('themes/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('themes/js/sb-admin-2.min.js') }}"></script>
        <!-- Page level plugins -->
        <script src="{{ asset('themes/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('themes/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>        

        <!-- Page level custom scripts -->
        <!-- <script src="{{ asset('themes/js/demo/datatables-demo.js') }}"></script> -->

        <script>
            $(document).ready( function () {
                $('.data-table').DataTable({
                    "language":{
                        "decimal":        "",
                        "emptyTable":     "Tabela limpa",
                        "info":           "Exibindo _START_ até _END_ de _TOTAL_ registros",
                        "infoEmpty":      "Sem registros",
                        "infoFiltered":   "(filtrado por _MAX_ total de registros)",
                        "infoPostFix":    "",
                        "thousands":      ",",
                        "lengthMenu":     "Exibir: _MENU_",
                        "loadingRecords": "Carregando...",
                        "processing":     "Processando...",
                        "search":         "Buscar:",
                        "zeroRecords":    "Nenhum registro encontrado",
                        "paginate": {
                            "first":      "Primeiro",
                            "last":       "Ultimo",
                            "next":       "Proximo",
                            "previous":   "Anterior"
                        },
                        "aria": {
                            "sortAscending":  ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        },
                        "responsive": "true",
                    }, 
                    "autoWidth": true
                }); 

                // const divSearchDataTable = $('.data-table').find('.dataTables_filter');
                // console.log(divSearchDataTable)
                // $(divSearchDataTable).css('text-align:rigth')
            });
        </script>


        @yield('scripts')

        {{-- @livewireScripts --}}

    </body>
</html>
