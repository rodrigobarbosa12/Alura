<?php

namespace Application\Service;

use Application\Service\APIConciliadora;
use Zend\Authentication\Result;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Json\Json;
use Zend\Stdlib\ArrayObject;
use Zend\Json\Exception\ExceptionInterface as JsonException;

class AuthenticationAdapter
{
    /**
     * @var \Application\Service\APIConciliadora
     */
    private $api;

    public function __construct(APIConciliadora $api)
    {
        $this->api = $api;
    }

    public function authenticate()
    {
        $resultado = $this->api->getUsuario();
        try {
            $array = Json::decode($resultado->getBody(), Json::TYPE_ARRAY);
        } catch (JsonException $e) {
            return new Result(Result::FAILURE, null);
        }

        if (!$resultado->isSuccess()) {
            return new Result(Result::FAILURE, null, $array);
        }

        $array = Json::decode($resultado->getBody(), Json::TYPE_ARRAY);
        $usuario = new ArrayObject($array, ArrayObject::ARRAY_AS_PROPS);
        $empresa = $this->api->getEmpresa();
        if (is_array($empresa)) {
            $usuario->empresa = $empresa;
        }

        $urlLojas = $this->api->getUrlLojas();
        if (is_array($urlLojas)) {
            $usuario->urlLojas = $urlLojas;
        }

        return new Result(Result::SUCCESS, $usuario);
    }
}
