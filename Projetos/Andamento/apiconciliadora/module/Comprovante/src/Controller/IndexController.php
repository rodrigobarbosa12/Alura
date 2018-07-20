<?php

namespace Comprovante\Controller;

use Application\Controller\AbstractRestfulCorsController;
use Application\Service\JsonWebToken;
use Comprovante\Service\Comprovante;
use Zend\View\Model\JsonModel;


class IndexController extends AbstractRestfulCorsController
{

  /**
     * @var Comprovante
     */
    protected $service;

    /**
     * @var JsonWebToken
     */
    protected $serviceJsonToken;

    public function __construct(Comprovante $service)
    {
        $this->service = $service;
    }

    public function getList()
    {
        try {

            $pequisa = new \Comprovante\Entity\Pesquisa($this->params()->fromQuery());

            return new JsonModel([
                'data' => $this->resultSetToArray($this->service->selecionar($pequisa)),
                'count' => $this->service->contar($pequisa)->toArray()
            ]);
        } catch (ExceptionInterface $err) {
            $this->getResponse()->setStatusCode($err->getCode() ?: 400);
            return new JsonModel(['message' => $err->getMessage()]);
        }
    }

}
