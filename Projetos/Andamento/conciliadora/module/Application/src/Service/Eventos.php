<?php

namespace Application\Service;

use Zend\Mvc\MvcEvent;
use Zend\Stdlib\ResponseInterface as Response;
use Zend\Stdlib\RequestInterface as Request;
use Zend\Authentication\Result;

class Eventos
{
    /**
     * @var \Zend\Authentication\AuthenticationService
     */
    private $authentication;

    /**
     * @var \Zend\Permissions\Acl\Acl
     */
    private $acl;

    public function __construct(
        \Zend\Authentication\AuthenticationService $authentication,
        \Zend\Permissions\Acl\Acl $acl
    ) {
        $this->authentication = $authentication;
        $this->acl = $acl;
    }

    public function authenticate(MvcEvent $evento)
    {
        if (!$evento->getRouteMatch()->getParam('authenticate')) {
            return;
        }

        $result = $this->authentication->authenticate();

        if (!$result->isValid()) {
            return $this->redirecionarParaLogin($evento);
        }
    }

    public function controlarAcesso(MvcEvent $evento)
    {
        $nivel = $this->authentication->getIdentity()
            ? $this->authentication->getIdentity()->nivel
            : \Application\Module::NIVEL_CLIENTE;

        $isAllowed = $this->acl->isAllowed(
            $nivel,
            $evento->getRouteMatch()->getMatchedRouteName()
        );

        if ($isAllowed) {
            return;
        }

        $evento->getResponse()->setStatusCode(401);
        $evento
            ->getViewModel()
            ->setTemplate('layout/layout')
            ->getChildrenByCaptureTo('content')[0]
            ->setTemplate('error/401');
    }

    private function redirecionarParaLogin(MvcEvent $evento)
    {
        $request = $evento->getRequest();
        $urlSolicitada = $request->getUri()->getPath() !== '/' ? $request->getUri()->toString() : null;

        $url = '/login?' . http_build_query([
            'url-solicitada' => $urlSolicitada,
        ]);

        return $this->redirecionar($evento->getResponse(), $url);
    }
    private function redirecionar(Response $response, string $url)
    {
        $response
            ->setStatusCode(302)
            ->getHeaders()
            ->addHeaderLine('Location', $url);

        return $response;
    }
}
