<?php

namespace LoginTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class IndexControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        $this->setApplicationConfig(include __DIR__ . '/../../../../config/application.config.php');
        parent::setUp();
    }

    public function testeLoginActionPodeSerAcessada()
    {
        $this->dispatch('/login', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('login');
        $this->assertControllerName(\Login\Controller\IndexController::class);
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('login');
    }

    public function testeLoginActionIraRenderizarComLayout()
    {
        $this->dispatch('/login', 'GET');
        $this->assertQuery('#form-login');
        $this->assertQuery('#m_login_forget_password');
        $this->assertQuery('#form-esqueci-minha-senha');
    }

    // public function testLogoutActionIraRedirecionarParaLogin()
    // {
    //     $this->dispatch('/logout', 'GET');
    //     $this->assertResponseStatusCode(302);
    //     $this->assertModuleName('login');
    //     $this->assertControllerName(\Login\Controller\IndexController::class);
    //     $this->assertControllerClass('IndexController');
    //     $this->assertMatchedRouteName('logout');
    // }
}
