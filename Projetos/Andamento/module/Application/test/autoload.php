<?php // @codingStandardsIgnoreFile

const JSON_COMPROVANTE = '{"data":[{"id": "390", "tipo": "1", "codigo_comercial": "1047710797", "id": "391", "tipo": "2", "codigo_comercial": "1047710798"},{"id":"1","empresasId":"1","nome":"X-Bacon","descricao":"queijo, tomate, alface, bacon","preco":"10.50","ativo":"1"}],"count":{"pagina":1,"quantidadePaginas":1,"totalRegistros":2}}';
const COMPROVANTE = [
    'data' => [
        [
            'id' => '390',
            'tipo' => '1',
            'codigo_comercial' => '1047710797'
        ],
        [
            'id' => '391',
            'tipo' => '2',
            'codigo_comercial' => '1047710798'
        ],
    ],
    'count' => [
        'pagina' => 1,
        'quantidadePaginas' => 1,
        'totalRegistros' => 2
    ]
];


// function mockAutenticacao($phpunit, $usuario) {
//     $auth = $phpunit->getMockBuilder(\Zend\Authentication\AuthenticationService::class)
//         ->disableOriginalConstructor()
//         ->setMethods([
//             'hasIdentity',
//             'getIdentity',
//             'authenticate',
//         ])
//         ->getMock();

//     $phpunit->getApplicationServiceLocator()->setAllowOverride(true);
//     $phpunit->getApplicationServiceLocator()->setService(\Zend\Authentication\AuthenticationService::class, $auth);
//     $phpunit->getApplicationServiceLocator()->setAllowOverride(false);

//     $auth
//         ->expects($phpunit->any())
//         ->method('hasIdentity')
//         ->willReturn(true);

//     $auth
//         ->expects($phpunit->any())
//         ->method('getIdentity')
//         ->willReturn($identity);

//     $auth
//         ->expects($phpunit->any())
//         ->method('authenticate')
//         ->willReturn(new \Zend\Authentication\Result(\Zend\Authentication\Result::SUCCESS, $identity));
// }

