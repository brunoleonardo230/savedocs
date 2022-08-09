<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('themes/css/sb-admin-2.css') }}">

        
    </head>
    <body class="bg-gradient-primary">
        
        {{ $slot }}
        
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('themes/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('themes/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('themes/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('themes/js/sb-admin-2.min.js') }}"></script>

        <script src="{{ asset('themes/vendor/jquery-mask/jquery.mask.min.js') }}"></script>

        <script>
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