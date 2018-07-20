<?php

namespace Application\Service;

use Zend\Http\Client;
use Zend\Http\Response;
use Zend\Http\Request;
use Zend\Json\Json;

class APIConciliadora
{
    /**
     * @var \Zend\Http\Client
     */
    private $client;

    /**
     * @var \Zend\Http\Request
     */
    private $request;

    public function __construct(
        Client $client,
        Request $request
    ) {
        $this->client = $client;
        $this->request = $request;
    }

    public function getResumo()
    {
        return $this->xhr('/resumo');
    }

    public function getComprovante()
    {
        return $this->xhr('/comprovante');
    }


    private function xhr(string $url)
    {
        $this->client->getUri()->setPath($url);

        $this->client->setParameterGet($this->request->getQuery()->toArray());
        return $this->extrairResposta($this->client->send());
    }

    private function extrairResposta(Response $response)
    {
        if ($response->getStatusCode() === Response::STATUS_CODE_401) {
            $query = '/login?url-solicitada=' . rawurlencode($this->request->getUri()->toString());

            $response
                ->setStatusCode(302)
                ->getHeaders()
                ->addHeaderLine('Location', $query);
        }

        if (!$response->isSuccess()) {
            return $response;
        }

        return Json::decode($response->getBody(), Json::TYPE_ARRAY);
    }
}