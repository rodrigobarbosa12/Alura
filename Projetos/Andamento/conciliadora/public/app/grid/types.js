/* @flow */

export type Ordenacao = {
    coluna: string;
    ordem: string;
}

export type Count = {
    pagina: number,
    quantidadePaginas: number,
    totalRegistros: number,
}

export type Opcao = 'iniciando' | 'contendo' | '' | '<' | '>' | '<=' | '>=' | string;

export type Filtro = {
    valor: string,
    opcao: Opcao,
    coluna: string,
}

export type TipoOpcao = 'string' | 'number';

export type ValoresFormulario = {
    filtro: Filtro | null,
    ordenacao: string,
    pagina?: number,
    quantidade?: number | null,
    colunas: Array<string> | string,
}

export type Retorno = Object[] | {
    count: Count,
    data: Object[],
}

export type AxiosError = Error & {
    response: {
        data: Object & { mensagem: string },
        status: number,
    },
};
