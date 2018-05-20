
class Conta{

	constructor(titular, saldo){
		this._nome = titular;
		this._saldo = saldo;
	}

	get titular(){
		return this._nome;
	}

	get saldo(){
		return this._saldo;
	}

	atualiza(taxa){
		throw new Error('Você deve sobrescrever o método ');
	}

}
