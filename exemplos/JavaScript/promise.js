
let ok = true;
let promise = new Promise((resolve, reject) => {
    setTimeout(() => {
        if (ok){
        resolve('PROMISE RESOLVIDA')
        }
        reject('HOUVE PROBLEMAS')
    }, 3000);

});

promise
.then(resultado => console.log(resultado))
.catch(erro => console.log(erro));