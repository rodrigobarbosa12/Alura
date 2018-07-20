
import $ from 'jquery';
import xhr from '../utils/xhr';
import applyLoading from '../utils/apply-loading';

const mostrarMensagem = (type, msg) => {
    const form = $('#m_login .m-login__signin form');
    const alert = $(`<div class="m-alert m-alert--outline alert alert-${type} alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <span></span>
        </div>`);

    form.find('.alert').remove();
    alert.prependTo(form);
    alert.animateClass('fadeIn animated');
    alert.find('span').html(msg);
};

const displaySignUpForm = () => {
    $('#m_login')
        .removeClass('m-login--forget-password')
        .removeClass('m-login--signin')
        .addClass('m-login--signup');

    $('#m_login .m-login__signup').animateClass('flipInX animated');
};

const displaySignInForm = () => {
    $('#m_login')
        .removeClass('m-login--forget-password')
        .removeClass('m-login--signup')
        .addClass('m-login--signin');

    $('#m_login.m-login__signin')
        .animateClass('flipInX animated');
};

const displayForgetPasswordForm = () => {
    $('#m_login')
        .removeClass('m-login--signin')
        .removeClass('m-login--signup')
        .addClass('m-login--forget-password');

    $('#m_login .m-login__forget-password').animateClass('flipInX animated');
};

const handleFormSwitch = () => {
    $('#m_login_forget_password').click((e) => {
        e.preventDefault();
        displayForgetPasswordForm();
    });

    $('#m_login_forget_password_cancel').click((e) => {
        e.preventDefault();
        displaySignInForm();
    });

    $('#m_login_signup').click((e) => {
        e.preventDefault();
        displaySignUpForm();
    });

    $('#m_login_signup_cancel').click((e) => {
        e.preventDefault();
        displaySignInForm();
    });
};

const setValidacaoFormulario = () => {
    const form = $('#form-esqueci-minha-senha');

    form.validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
        },
        messages: {
            email: {
                required: 'Campo obrigatório.',
                email: 'Digite um email válido.',
            },
        },
    });
};

const loadingBotao = {
    show() {
        $('#m_login_forget_password_submit')
            .addClass('m-loader m-loader--right m-loader--light')
            .attr('disabled', true);
    },
    hide() {
        $('#m_login_forget_password_submit')
            .removeClass('m-loader m-loader--right m-loader--light')
            .attr('disabled', false);
    },
};

const esqueciMinhaSenha = applyLoading(email => xhr.post('/usuario/esqueci-minha-senha', { email }), loadingBotao);

const handleForgetPasswordFormSubmit = (e) => {
    e.preventDefault();
    const form = $('#form-esqueci-minha-senha');
    if (!form.valid()) {
        return false;
    }

    const email = $('#m_email').val();
    esqueciMinhaSenha(email).then(() => {
        $('#form-esqueci-minha-senha')
            .clearForm()
            .validate()
            .resetForm();

        displaySignInForm();

        $('#form-login')
            .clearForm()
            .validate()
            .resetForm();

        mostrarMensagem('success', 'Legal! A recuperação de senha foi enviada para o seu e-mail');
    });

    return false;
};


const setEventoEsqueciMinhaSenha = () => {
    setValidacaoFormulario();
    const form = document.forms.namedItem('form-esqueci-minha-senha');
    if (form) {
        form.onsubmit = handleForgetPasswordFormSubmit;
    }
    handleFormSwitch();
};

export default setEventoEsqueciMinhaSenha;
