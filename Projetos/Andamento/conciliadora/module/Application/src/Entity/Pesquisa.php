<?php

namespace Application\Entity;

use Application\Exception\RuntimeException;
use Application\Mapper\Where;
use Zend\Db\Sql;
use Zend\Db\Sql\Expression;
use Zend\Db\Sql\Predicate\Operator;

/**
 * Esta classe é responsável por aplicar a pesquisa em todas as grids do sistema
 * Não aplicar regras de negócio aqui, apenas lógica sobre a pesquisa
 */
class Pesquisa extends AbstractEntity
{
    const OPCAO_INICIANDO = 'iniciando';
    const OPCAO_CONTENDO  = 'contendo';

    /**
     * Valor digitado na pesquisa
     *
     * @var FiltroPesquisa|null
     */
    protected $filtro;

    /**
     * Faz pesquisa por um ID ou vários ID's de produto
     *
     * @var array|string
     */
    protected $ids;

    /**
     * @var int
     */
    protected $quantidade = 10;

    /**
     * @var int
     */
    protected $pagina = 0;

    /**
     * @var string
     */
    protected $ordenacao;

    /**
     * @var boolean
     */
    protected $iniciando = false;

    /**
     * Coluna personalizada, para uso do where na querys
     *
     * @var array
     */
    protected $colunas;

    /**
     * Colunas que pertencem ao join
     *
     * @var array   ['nomeDaTabela' => ['coluna1', 'coluna2'] ];
     */
    protected $colunasDistintas;

    /**
     * Filtros sobre os representantes
     *
     * @var array
     */
    protected $representantes;

    /**
     * Para filtrar resultados por empresa
     *
     * @var int
     */
    protected $empresasId;

    /**
     * Aplica no select o columns, o order, o limit, o offset e o where do parametro
     *
     * @param Sql\Select $select
     */
    public function aplicarSelect(Sql\Select $select, $tabela = '')
    {
        if ($this->getColunas()) {
            $select->columns($this->getColunasExpressao());
        }

        if ($this->getOrdenacao()) {
            $select->order($this->getOrdenacao());
        }

        $this->aplicarPaginacao($select);

        $this->aplicarFiltro($select, $tabela);
    }

    public function aplicarPaginacao(Sql\Select $select)
    {
        if ($this->getQuantidade()) {
            $select->limit($this->getQuantidade())
                ->offset($this->getQuantidade() * $this->getPagina());
        }
    }

    /**
     * Trata as colunas com .
     *
     * @return array
     */
    private function getColunasExpressao()
    {
        $colunas = [];
        foreach ($this->getColunas() as $coluna) {
            if (!preg_match('/\./', $coluna)) {
                $colunas[] = $coluna;
                continue;
            }

            $colunaSemTabela = explode('.', $coluna)[1];
            if (!isset($colunas[$colunaSemTabela])) {
                $colunas[$colunaSemTabela] = new Expression($coluna);
            }
        }
        return $colunas;
    }

    /**
     * Aplica o filtro
     *
     * @param Sql\Select $select
     */
    public function aplicarFiltro(Sql\Select $select, $tabela = '')
    {
        if (!$this->getFiltro()) {
            return;
        }

        $select->where(new Where());

        if ($this->getFiltro()->getColuna()) {
            $this->aplicarFiltroPorColuna($select, $tabela);
            return;
        }

        if ($this->getColunas()) {
            $nest = $select->where->nest;
            foreach ($this->getColunas() as $coluna) {
                $this->aplicarFiltroEmColunasGenericas($coluna, $nest);
            }
            $nest->unest;
        }
    }

    /**
     * Metodo que aplica o where na coluna de acordo com o filtro da pesquisa
     *
     * @param Sql\Select $select
     */
    private function aplicarFiltroPorColuna(Sql\Select $select, $tabela = '')
    {
        $val = $this->getFiltro()->getValor();
        $col = $this->getFiltro()->getColuna();

        if ($tabela) {
            $col = "$tabela.{$this->getFiltro()->getColuna()}";
        }

        switch ($this->getFiltro()->getOpcao()) {
            case self::OPCAO_INICIANDO:
            case self::OPCAO_CONTENDO:
                $col = new Sql\Expression("UPPER($col)");
                $iniciando = $this->getFiltro()->getOpcao() === self::OPCAO_INICIANDO;
                $select->where->likeAllPossibilities($col, strtoupper($val), $iniciando);
                break;
            case Operator::OPERATOR_EQUAL_TO:
                $select->where->equalTo($col, $val);
                break;
            case Operator::OPERATOR_LESS_THAN:
                $select->where->lessThan($col, $val);
                break;
            case Operator::OPERATOR_LESS_THAN_OR_EQUAL_TO:
                $select->where->lessThanOrEqualTo($col, $val);
                break;
            case Operator::OPERATOR_GREATER_THAN:
                $select->where->greaterThan($col, $val);
                break;
            case Operator::OPERATOR_GREATER_THAN_OR_EQUAL_TO:
                $select->where->greaterThanOrEqualTo($col, $val);
                break;
            default:
                throw new RuntimeException("Filtro inválido", 422);
        }
    }

    /**
     * Metodo que aplica o where em todas as colunas da tabela
     *
     * @param string $coluna
     * @param Sql\Where $where
     */
    private function aplicarFiltroEmColunasGenericas($coluna, Sql\Where $where)
    {
        $col = new Sql\Expression("(cast(upper($coluna) as nchar))");
        $val = $this->getFiltro()->getValorParaWhere();

        switch ($this->getFiltro()->getOpcao()) {
            case self::OPCAO_INICIANDO:
            case self::OPCAO_CONTENDO:
                $iniciando = $this->getFiltro()->getOpcao() === self::OPCAO_INICIANDO;
                $where->or->likeAllPossibilities($col, $val, $iniciando);
                break;
            default:
                throw new RuntimeException("Filtro inválido", 422);
        }
    }

    /**
     * Retorna as tabelas das colunas do join
     *
     * @param string $tabela
     * @return null
     * @throws RuntimeException
     */
    public function getColunasDistintas(string $tabela)
    {
        if (isset($this->colunasDistintas[$tabela])) {
            return $this->colunasDistintas[$tabela];
        }

        throw new RuntimeException('Não foi informado a tabela de join', 404);
    }

    public function setColunasDistintas($colunasDistintas)
    {
        $this->colunasDistintas = $colunasDistintas;
    }

    public function setIniciando($iniciando)
    {
        $this->iniciando = !!$iniciando;
    }

    public function getIniciando()
    {
        return $this->iniciando;
    }

    public function getFiltro()
    {
        return $this->filtro;
    }

    public function setFiltro(array $filtro)
    {
        $this->filtro = new FiltroPesquisa($filtro);
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function getPagina()
    {
        return $this->pagina;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = (int) $quantidade;
    }

    public function setPagina($pagina)
    {
        $this->pagina = (int) $pagina;
    }

    public function getIds()
    {
        return $this->ids;
    }

    public function setIds(array $ids)
    {
        $this->ids = $ids;
    }

    public function getColunas()
    {
        return $this->colunas;
    }

    public function setColunas($colunas)
    {
        if (is_string($colunas)) {
            $colunas = explode(',', $colunas);
        }

        if (!is_array($colunas)) {
            throw new RuntimeException('Colunas inválidas.');
        }

        $this->colunas = $colunas;
    }

    public function getOrdenacao()
    {
        return $this->ordenacao;
    }

    public function setOrdenacao($ordenacao)
    {
        $this->ordenacao = $ordenacao;
    }

    public function getRepresentantes()
    {
        return $this->representantes;
    }

    public function setRepresentantes($rep = [], $coluna = false)
    {
        $this->representantes = new FiltroPesquisa();
        $this->representantes->setColuna($coluna);
        $this->representantes->setValor((array) $rep);
    }

    public function getEmpresasId()
    {
        return $this->empresasId;
    }

    public function setEmpresasId($empresasId)
    {
        $this->empresasId = (int) $empresasId;
    }
}
