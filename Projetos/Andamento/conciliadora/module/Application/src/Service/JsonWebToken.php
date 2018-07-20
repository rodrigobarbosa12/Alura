<?php

namespace Application\Service;

use Firebase\JWT\JWT;
use Zend\Http\PhpEnvironment\Request;
use Application\Module;

class JsonWebToken
{
    public function get(string $token)
    {
        $resultado = JWT::decode($token, base64_decode(Module::SENHA_JWT), ['HS256']);

        return $resultado;
    }

    public function criar(array $data)
    {
        $resultado = JWT::encode($data, base64_decode(Module::SENHA_JWT));

        return $resultado;
    }

    public function getPorHeader(Request $request)
    {
        try {
            $auth = $request->getHeader('Authorization');

            if (!$auth) {
                throw new \Exception();
            }

            $token = $auth->getFieldValue();

            // if ($token === Autenticacao::TESTE_TOKEN) {
            //     return new \Application\Entity\JsonToken([
            //         'empresa' => 1,
            //     ]);
            // }

            $tokenDadosObj = $this->get($token);

            $tokenDadosArray = get_object_vars($tokenDadosObj->data);
            return new \Application\Entity\JsonToken($tokenDadosArray);
        } catch (\Exception $exc) {
            return new \Application\Entity\JsonToken();
        }
    }
}
