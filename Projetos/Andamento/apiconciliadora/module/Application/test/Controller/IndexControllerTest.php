<?php

namespace ApplicationTest\Service;

use Application\Controller\IndexController;
use Application\Service\TestCase;

class IndexControllerTest extends TestCase
{

    /**
     * @var IndexController
     */
    public $controller;

    public function setUp()
    {
        $this->controller = new IndexController();
    }

    public function testGetList()
    {
        $this->assertEquals(new \Zend\View\Model\ViewModel(), $this->controller->indexAction());
    }
}
