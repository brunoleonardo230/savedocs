$(document).ready( function () {
    addMaskInputs();
});

$("#physical_person" ).click(function() {

    $("#div_legal_person").removeClass('isVisible').addClass('isInvisible');
    $("#div_physical_person").removeClass('isInvisible').addClass('isVisible');

});

$("#legal_person" ).click(function() {

    $("#div_physical_person").removeClass('isVisible').addClass('isInvisible');
    $("#div_legal_person").removeClass('isInvisible').addClass('isVisible');
    
});

function addMaskInputs() {

    $("input#cnpj").mask('00.000.000/0000-00', {reverse: true});
    
    $("input#cpf").mask("000.000.000-00", {reverse: true});
    $("input#representative_cpf").mask("000.000.000-00", {reverse: true});

    $("input#phone").mask('(00) 00000-0000');
    $("input#representative_fone").mask('(00) 00000-0000');

    $("input#zip_code").mask("00000-000");

    $("input#number").mask("0000");

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

function showPhysicalPersonForm() {
    $("#div_legal_person").removeClass('isVisible').addClass('isInvisible');
    $("#div_physical_person").removeClass('isInvisible').addClass('isVisible');

    $("#physical_person").prop('checked',true);
    $("#legal_person").prop('checked',false);
}

function showLegalPersonForm() {
    $("#div_physical_person").removeClass('isVisible').addClass('isInvisible');
    $("#div_legal_person").removeClass('isInvisible').addClass('isVisible');

    $("#legal_person").prop('checked',true);
    $("#physical_person").prop('checked',false);
}

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