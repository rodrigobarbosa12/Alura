<?php

namespace Resumo\Controller;

use Application\Service\APIConciliadora;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractRestfulController
{
    /**
     * @var APIConciliadora
     */
    private $api;

    public function __construct(APIConciliadora $api)
    {
        $this->api = $api;
    }

    public function options()
    {
        return new JsonModel();
    }

    public function getList()
    {
        $this->layout('layout/admin');

        $resumo = $this->api->getResumo();

        return [
            'resumo' => $resumo,
        ];
    }
}
