
function xhr(metodo, url, dados){
    console.log('oi');
    var xhr = new XMLHttpRequest();
    xhr.open(metodo, url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(dados);
}

export  default xhr;