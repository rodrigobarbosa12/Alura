<?php


function selectConciliadora($pdoConciliadora, $administradora)
{
    $stmt = $pdoConciliadora->prepare("SELECT * FROM conciliadora.arquivos where conteudo like $administradora && traducao = 0 ");

    if($stmt->execute()){
        echo retorno("Select ok", true);
    } else {
        retorno($stmt->errorInfo());
    }

    return $stmt;
}

function traduzir($pdoConciliadora, $arquivo, $administradora)
{
    $traduzido = 1;
    $stmt = $pdoConciliadora->prepare("update conciliadora.arquivos set traducao = :traduzido where conteudo like $administradora && arquivo = :arquivo");
    $stmt->bindParam(':traduzido', $traduzido , PDO::PARAM_INT);
    $stmt->bindParam(':arquivo', $arquivo , PDO::PARAM_STR);

        if($stmt->execute()){
           echo retorno('Traduzido com sucesso!', true);
        } else {
            retorno($stmt->errorInfo());
        }

}


function verificarEstabelecimento($pdo, $coluna, $estabelecimento)
{
    $select = $pdo->prepare("SELECT id FROM integracoes where estabelecimento = :estabelecimento");
    $select->bindParam(':estabelecimento', $estabelecimento, PDO::PARAM_INT);

    if($select->execute()){
        echo retorno("Estabelecimento verificado!", true);
    } else {
        retorno($stmt->errorInfo());
    }

        while ($id = $select->fetch(PDO::FETCH_ASSOC)) {
            $integracoes_id = $id['id'];
	}

    $coluna->setIntegracoesId($integracoes_id);
    return $select;
}


function idHeader($pdo, $coluna)
{
    $arquivo = $coluna->getNomeArquivo();

    $select = $pdo->prepare("SELECT id FROM header WHERE arquivo = :arquivo");
    $select->bindParam(':arquivo', $arquivo, PDO::PARAM_STR);

    if($select->execute()){
        echo retorno("id header verificado!", true);
    } else {
        retorno($stmt->errorInfo());
    }

    while ($id = $select->fetch(PDO::FETCH_ASSOC)) {
        $header_id = $id['id'];
    }

    return $header_id;
}

function convertData($data)
{
	if (substr($data, 4, 2) == '20' && strlen($data) > 6) { //1010'20'18
		return $data = DateTime::createFromFormat('dmY', $data)->format('Ymd'); //2018-10-10
	} elseif ($data === '00000000' || $data === '000000' || $data === '' || $data === ' ' || $data == '        ' || $data == '      '){
		 return $data = NULL;
	}
		return $data;
}

function convetDouble($double)
{
	$valor1 = substr($double, 0, -2);
	$valor2 = substr($double, -2);
	return $double = doubleval("$valor1.$valor2");
}


function retorno($mensagem, $sucesso = false)
{
    $retorno = array();
    $retorno['sucesso'] = $sucesso;
    $retorno['mensagem'] = $mensagem;
    return json_encode($retorno);
}
