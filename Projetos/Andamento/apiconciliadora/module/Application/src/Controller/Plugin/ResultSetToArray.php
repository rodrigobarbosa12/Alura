<?php

namespace Application\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\Db\ResultSet\HydratingResultSet;

/**
 * Converte a resposta do banco pra array
 *
 * @return array
 */
class ResultSetToArray extends AbstractPlugin
{

    /**
     * Metodo que é acessado na controller
     *
     * @param HydratingResultSet $resultSet
     *
     * @return array
     */
    public function __invoke(HydratingResultSet $resultSet)
    {
        $lista = [];
        foreach ($resultSet as $entity) {
            $lista[] = $entity->toArray();
        }
        return $lista;
    }
}
