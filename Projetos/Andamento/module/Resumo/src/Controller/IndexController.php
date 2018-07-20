<?php

namespace Resumo\Controller;

use Application\Controller\AbstractRestfulCorsController;
use Application\Service\JsonWebToken;
use Resumo\Service\Resumo;
use Zend\View\Model\JsonModel;


class IndexController extends AbstractRestfulCorsController
{

  /**
     * @var Resumo
     */
    protected $service;

    /**
     * @var JsonWebToken
     */
    protected $serviceJsonToken;

    public function __construct(Resumo $service)
    {
        $this->service = $service;
    }

    public function getList()
    {
        try {

            $pequisa = new \Resumo\Entity\Pesquisa($this->params()->fromQuery());

            return new JsonModel([
                'data' => $this->resultSetToArray($this->service->selecionar($pequisa)),
                'count' => $this->service->contar($pequisa)->toArray()
            ]);
            // var_dump('<pre>', $return);
            // die();
        } catch (ExceptionInterface $err) {
            $this->getResponse()->setStatusCode($err->getCode() ?: 400);
            return new JsonModel(['message' => $err->getMessage()]);
        }
    }

}
