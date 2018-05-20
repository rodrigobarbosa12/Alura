class MensagemView extends View{
	
	constructor(elemento){ // Esse codigo não é necessario
        super(elemento);
    }

	template(model){
		return model.texto ? `<p class="alert alert-info">${model.texto}</p>` : `<p></p>`;
	}
}
