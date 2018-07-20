//== Class definition
var WizardDemo = function () {
    //== Base elements
    var wizardEl = $('#m_wizard');
    var formEl = $('#m_form');
    var validator;
    var wizard;

    //== Private functions
    var initWizard = function () {
        //== Initialize form wizard
        wizard = wizardEl.mWizard({
            startStep: 1
        });

        //== Validation before going to next page
        wizard.on('beforeNext', function(wizard) {
            if (validator.form() !== true) {
                return false;  // don't go to the next step
            }
        })

        //== Change event
        wizard.on('change', function(wizard) {
            mApp.scrollTop();
        });
    }

    var initValidation = function() {
        validator = formEl.validate({
            //== Validate only visible fields
            ignore: ":hidden",

            //== Validation rules
            rules: {
                //=== Client Information(step 1)
                //== Client details
                'empresa[razaoSocial]': {
                    required: true,
                },
                'empresa[fantasia]': {
                    required: true,
                },
                'empresa[cnpj]': {
                    required: true,
                    minlength: 14,
                },
                'empresa[empresasTiposId]': {
                    required: true,
                },
                'contato[nome]': {
                    required: true,
                },
                'contato[ddd]': {
                    required: true,
                    minlength: 2,
                    maxlength: 2,
                    number: true,
                },
                'contato[numero]': {
                    required: true,
                    minlength: 8,
                    maxlength: 9,
                    number: true,
                },
                'endereco[cep]': {
                    required: true,
                },
                'endereco[logradouro]': {
                    required: true,
                },
                'endereco[numero]': {
                    required: true,
                },
                'endereco[bairro]': {
                    required: true,
                },
                'endereco[cidade]': {
                    required: true,
                },
                'endereco[estado]': {
                    required: true,
                },
                'cores[primaria]': {
                    required: true,
                },
                'cores[secundaria]': {
                    required: true,
                },
                'cores[terciaria]': {
                    required: true,
                },
                'logo': {
                    required: true,
                },
                'usuario[nome]': {
                    required: true,
                },
                'usuario[email]': {
                    required: true,
                    email: true,
                },
                'usuario[senha]': {
                    required: true,
                    minlength: 6,
                    maxlength: 45,
                },
                'usuario[nascimento]': {
                    required: true,
                },
                'usuario[cpf]': {
                    required: true,
                    minlength: 14,
                },
            },

            //== Validation messages
            messages: {
                'account_communication[]': {
                    required: 'Você deve selecionar pelo menos uma opção!'
                },
                accept: {
                    required: "Você deve aceitar o contrato de Termos e Condições de uso!"
                }
            },

            //== Display error
            invalidHandler: function(event, validator) {

                mApp.scrollTop();
            },

            //== Submit valid form
            submitHandler: function (form) {

            }
        });
    }

    return {
        // public functions
        init: function() {
            wizardEl = $('#m_wizard');
            formEl = $('#m_form');
            initWizard();
            initValidation();
        }
    };
}();

jQuery(document).ready(function() {
    WizardDemo.init();
});

jQuery.extend(jQuery.validator.messages, {
    required: "Campo obrigatório.",
    remote: "Por favor corrija este campo.",
    email: "Por favor insira um endereço de email válido.",
    url: "Por favor, insira uma URL válida.",
    date: "Por favor insira uma data válida.",
    number: "Por favor, insira um número válido.",
    equalTo: "Por favor digite o mesmo valor novamente.",
    digits: "Please enter only digits.",
    maxlength: jQuery.validator.format("Por favor, digite no máximo {0} caracteres."),
    minlength: jQuery.validator.format("Por favor, digite no minimo {0} caracteres."),
    rangelength: jQuery.validator.format("Por favor digite um valor entre {0} e {1} caracteres de comprimento."),
    range: jQuery.validator.format("Por favor digite um valor entre {0} e {1}."),
    max: jQuery.validator.format("Por favor digite um valor menor ou igual a {0}."),
    min: jQuery.validator.format("Por favor digite um valor maior ou igual a {0}.")
});