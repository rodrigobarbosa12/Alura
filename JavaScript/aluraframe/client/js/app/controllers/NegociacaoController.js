
class NegociacaoController{

    constructor(){
        let $ = document.querySelector.bind(document);//Busca uma unica vez
            this._inputData = $("#data");
            this._inputQuantidade = $("#quantidade");
            this._inputValor = $("#valor");

            this._listaNegociacoes = new Bind(
                new ListaNegociacoes(),
                new NegociacoesView($("#negociacoesView")),
                'adiciona','esvazia');

            this._mensagem = new Bind(
                new Mensagem(),
                new MensagemView($("#mensagemView")),
                'texto');
    }

    adiciona(event){
        event.preventDefault();
        this._listaNegociacoes.adiciona(this._criaNegociacao());
        this._mensagem.texto = 'Mensagem adicionada com sucesso!';
        this._limpaFormulario();
    }

    importaNegociacoes(){

        let service = new NegociacaoService();

        Promise.all([
            service.obterNegociacaoDaSemana(),
            service.obterNegociacaoDaSemanaAnterior(),
            service.obterNegociacaoDaSemanaRetrasada() 
        ])
            .then(negociacoes => {
               negociacoes 
                .reduce((arrayAchatado, array) => arrayAchatado.concat(array), [])
                .forEach(negociacao => this._listaNegociacoes.adiciona(negociacao));
                this._mensagem.texto = "Negociações obtida com sucesso.";
            })
            .catch(erro => this._mensagem.texto = erro);


        // service.obterNegociacaoDaSemana((erro, negociacoes) => {
        //     if(erro){
        //         this._mensagem.texto = erro;
        //         return;
        //     }
        //     negociacoes.forEach(negociacao => this._listaNegociacoes.adiciona(negociacao))

        //     service.obterNegociacaoDaSemanaAnterior((erro, negociacoes) => {
        //         if(erro){
        //             this._mensagem.texto = erro;
        //             return;
        //         }
        //         negociacoes.forEach(negociacao => this._listaNegociacoes.adiciona(negociacao))
        //         this._mensagem.texto = 'Negociações importadas com sucesso.';


        //             service.obterNegociacaoDaSemanaRetrasada((erro, negociacoes) => {
        //                 if(erro){
        //                     this._mensagem.texto = erro;
        //                     return;
        //                 }
        //             negociacoes.forEach(negociacao => this._listaNegociacoes.adiciona(negociacao))
        //             this._mensagem.texto = 'Negociações importadas com sucesso.';

        //         });
        //     });
        // });
    }

    apaga(){
        this._listaNegociacoes.esvazia();
        this._mensagem.texto = 'Negociacao apagada com sucesso!';
    }

    _criaNegociacao(){
        return new Negociacao(
            DataHelper.textoParaData(this._inputData.value),
            this._inputQuantidade.value,
            this._inputValor.value
        );
    }

    _limpaFormulario() {
        this._inputData.value = '';
        this._inputQuantidade.value = 1;
        this._inputValor.value = 0.0
        this._inputData.focus();
    }
}