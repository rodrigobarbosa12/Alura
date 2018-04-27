class conta{

    constructor(nome, titular){
        this._nome = nome;
        this._conta = conta;
        this._saldo = 0;
    }

    deposito(valor){
        this._saldo += valor;
    }

    get saldo(){
        return this._saldo;
    }
    get nome(){
        return this._nome;
    }
    get conta(){
        return this._conta;
    }
}