<?php

namespace Login\Controller;

use Application\Module;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Http\Header\SetCookie;
use Zend\Authentication\AuthenticationService;

class IndexController extends AbstractActionController
{
    /**
     * @var \Zend\Authentication\AuthenticationService
     */
    private $auth;

    public function __construct(AuthenticationService $auth)
    {
        $this->auth = $auth;
    }

    public function loginAction()
    {
        return [
            'urlSolicitada' => $this->getRequest()->getQuery()->get('url-solicitada'),
            'message' => $this->getRequest()->getQuery()->get('message'),
        ];
    }

    // public function logoutAction()
    // {
    //     $this->auth->clearIdentity();
    //     $setCookie = new SetCookie(Module::CHAVE_TOKEN_MAXSCALLA, '', 0);
    //     $response = $this->redirect()->toUrl('/login');
    //     $response->getHeaders()->addHeader($setCookie);
    //     return $response;
    // }
}
