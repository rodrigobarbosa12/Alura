<?php

namespace ApplicationTest\Factory\Service;

use Application\Service\AuthenticationAdapter;
use Application\Service\APIConciliadora;
use PHPUnit\Framework\TestCase;
use Zend\ServiceManager\ServiceManager;

class AuthenticationAdapterTest extends TestCase
{
    public function testInvoke()
    {
        $serviceManager = new ServiceManager();

        $serviceManager->setService(
            APIConciliadora::class,
            $this->getMockBuilder(APIConciliadora::class)
            ->disableOriginalConstructor()
            ->getMock()
        );

        $factory = new \Application\Factory\Service\AuthenticationAdapter();
        $service = $factory($serviceManager, (AuthenticationAdapter::class));
        $this->assertInstanceOf(AuthenticationAdapter::class, $service);
    }
}
