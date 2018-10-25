import xhr from './../request/xhr';

var form = document.querySelector('#form');
var email = form.querySelector('#email');
var senha = form.querySelector('#senha');


form.addEventListener('submit', (e) => {
    e.preventDefault();
    const data = {
        email: email.value,
        password: senha.value,
    }
    console.log(data);
    this.xhr('post', 'http://localhost:3000/auth/authenticate', data);
});
