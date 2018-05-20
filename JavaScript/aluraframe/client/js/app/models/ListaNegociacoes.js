class ListaNegociacoes{

	constructor(){
		this._negociacoes = [];
	}

	adiciona(negociacao){
		this._negociacoes.push(negociacao);
	}

	get negociacoes(){
		// return this._negociacoes;
		return [].concat(this._negociacoes); 
	/*
		Ao passarmos o this._negociacoes dentro do concat(), 
		o retorno será uma nova lista, um novo array(CÓPIA)		
	*/
	}

	esvazia(){
		this._negociacoes = [];
	}
}