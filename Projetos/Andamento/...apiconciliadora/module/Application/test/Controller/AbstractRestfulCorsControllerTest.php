<?php

namespace ApplicationTest\Service;

use Application\Controller\AbstractRestfulCorsController;
use Application\Service\TestCase;
use Zend\View\Model\JsonModel;

class AbstractRestfulCorsControllerTest extends TestCase
{

    /**
     * @var AbstractRestfulCorsController
     */
    public $controller;

    public function setUp()
    {
        $this->controller = new AbstractRestfulCorsController();
    }

    public function testOptions()
    {
        $this->assertEquals(new JsonModel(), $this->controller->options());
    }
}
