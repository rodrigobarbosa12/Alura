<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class AbstractRestfulCorsController extends AbstractRestfulController
{
    public function options()
    {
        return new JsonModel();
    }
}
