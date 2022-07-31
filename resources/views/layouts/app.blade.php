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
        
        <style>
            input[type='radio'] {
                position: absolute;
                z-index: -1;
                opacity: 0;
            }
        
            input[type='radio'] + label {
                position: relative;
                cursor: pointer;
                padding-left: 30px;
            }
        
            input[type='radio'] + label::before {
                content: '';
                position: absolute;
                width: 20px;
                height: 20px;
                left: 0;
                bottom: 0;
                border: solid 2px;
                vertical-align: bottom;
            }
            input[type='radio']:checked + label::after {
                content: '';
                position: absolute;
                left: 10px;
                bottom: 10px;
                width: 10px;
                height: 20px;
                border-right: solid 3px green;
                border-bottom: solid 3px green;
                transform: rotate(45deg);
            }

            .isVisible {
                display: block;
            }

            .isInvisible {
                display: none;
            }

        </style>

        {{-- Lib Stripe --}}
        <script src="https://js.stripe.com/v3/"></script>

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
                        <div class="row d-sm-flex mb-4">
                            <div class="col-md-6">
                                <span class="h3 mb-0 text-gray-800"> {{ $header }} </span>
                            </div>
                            @if(isset($button))
                                <div class="col-md-6 text-right">
                                    <span class="mb-0"> {{ $button }} </span>
                                </div>
                            @endif
                        </div>

                        <!-- Session Status -->
                        @include('components.session-flash')

                        {{ $slot }}
                        
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
            });

            function validateRequiredInputs(input) {
            
                const form = $(input).closest('form');
                
                $(form).find('.error_required_input').remove();
                $(form).find('.isInvisible').remove();
            
                const inputs = $(form).find('input:required');
                const selects = $(form).find('select:required');
            
            
                let toSubmit = true;
            
                $.each(inputs, function(i, input){
                    if( !$(input).val() ) {
                        
                        var div = $(input).closest('div');
            
                        if(div.hasClass('form-group')){
                            $(div).parent().find('.error_required_input').remove();
                            
                            $(div).parent().append('<span class="error_required_input text-danger">Este campo é obrigatório</span>');
                        } else {
                            $(div).append('<span class="error_required_input text-danger">Este campo é obrigatório</span>');
                        }
            
                        toSubmit = false;
                    }
                });
            
                $.each(selects, function(i, select){
                    if( !$(select).val().length ) {
                        
                        var div = $(select).closest('div');
            
                        if(div.hasClass('form-group')){
                            div = $(div).closest('div');
                        }
            
                        $(div).append('<span class="error_required_input text-danger">Este campo é obrigatório</span>');
                        toSubmit = false;
                    }
                });
            
                if (toSubmit) {
                    $(form).submit(); 
                }
            
                return toSubmit;
            
            }
        </script>

    @yield('scripts')

    </body>
</html>
