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
        
        <script src="{{ asset('themes/vendor/jquery-mask/jquery.mask.min.js') }}"></script>

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
            });
        </script>

        <script>
            //  Adicionando Javascript Para Cadastro de Usuários
            function searchZipCode(isUserEdit) {
                const inputZipCode = $('input#zip_code').val();

                errorZipCodeHTML();

                //Nova variável "CEP" somente com dígitos.
                var zipCode = $("input#zip_code").val().replace(/\D/g, '');

                //Verifica se campo CEP possui valor informado.
                if (zipCode != "") {

                    //Expressão regular para validar o CEP.
                    var validateZipCode = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validateZipCode.test(zipCode)) {

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ zipCode +"/json/?callback=?", function(data) {
                            
                            if (!("erro" in data)) {

                                showAddressForm();

                                //Atualiza os campos com os valores da consulta.
                                $("input#address").val(data.logradouro);
                                $("input#number").prop('readonly', false);
                                $("input#complement").val(data.complemento).prop('readonly', false);
                                $("input#neighborhood").val(data.bairro);
                                $("input#city").val(data.localidade);
                                $("input#state").val(data.uf);
                            } else {
                                //CEP pesquisado não foi encontrado.
                                clearAddressForm();
                                hideAddressForm();
                                errorZipCodeHTML(true, "CEP não encontrado.");
                            }
                        });
                    }  else {
                        //CEP é inválido.
                        clearAddressForm();
                        hideAddressForm();
                        errorZipCodeHTML(true, "Formato de CEP inválido.");
                    }
                } else {
                    //CEP sem valor, limpa formulário.
                    if (!isUserEdit) {
                        clearAddressForm();
                        hideAddressForm();
                    }

                    errorZipCodeHTML(true, "Informe um CEP para busca.");
                }
            }

            function addMaskInputs() {
                $("input#cnpj").mask('00.000.000/0000-00', {reverse: true});
                
                $("input#cpf").mask("000.000.000-00", {reverse: true});
                $("input#representative_cpf").mask("000.000.000-00", {reverse: true});

                $("input#phone").mask('(00) 00000-0000');
                $("input#representative_fone").mask('(00) 00000-0000');

                $("input#zip_code").mask("00000-000");
            }

            function clearAddressForm() {
                $("input#zip_code").val("");
                $("input#address").val("");
                $("input#number").val("");
                $("input#complement").val("");
                $("input#neighborhood").val("");
                $("input#city").val("");
                $("input#state").val("");
            }

            function hideAddressForm() {
                $("#div_address").removeClass('isVisible').addClass('isInvisible');
            }

            function showAddressForm() {
                $("#div_address").removeClass('isInvisible').addClass('isVisible');
            }

            function errorZipCodeHTML(isVisible = false, msg = '') {
                const errorZipCodeMessage = $("#errorZipCodeMessage");

                if (isVisible) {

                    const content =  `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Ops!</strong> ${msg}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    `;

                   return $(errorZipCodeMessage).html(content);
                }

                return $(errorZipCodeMessage).text('');
            }

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
                    console.log('boooom!')
                    $(form).submit(); 
                }

                return toSubmit;

            }


        </script>


        @yield('scripts')

    </body>
</html>
