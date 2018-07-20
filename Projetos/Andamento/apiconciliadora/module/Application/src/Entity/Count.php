<?php

namespace Application\Entity;

class Count extends \Application\Entity\AbstractEntity
{
    protected $pagina;
    protected $quantidadePaginas;
    protected $totalRegistros;


    /**
     * Get the value of Pagina
     *
     * @return mixed
     */
    public function getPagina()
    {
        return $this->pagina;
    }

    /**
     * Set the value of Pagina
     *
     * @param mixed pagina
     *
     * @return self
     */
    public function setPagina(int $pagina)
    {
        $this->pagina = $pagina;

        return $this;
    }

    /**
     * Get the value of Quantidade Paginas
     *
     * @return mixed
     */
    public function getQuantidadePaginas()
    {
        return $this->quantidadePaginas;
    }

    /**
     * Set the value of Quantidade Paginas
     *
     * @param mixed quantidadePaginas
     *
     * @return self
     */
    public function setQuantidadePaginas($quantidadePaginas)
    {
        $this->quantidadePaginas = $quantidadePaginas;

        return $this;
    }

    /**
     * Get the value of Total Registros
     *
     * @return mixed
     */
    public function getTotalRegistros()
    {
        return $this->totalRegistros;
    }

    /**
     * Set the value of Total Registros
     *
     * @param mixed totalRegistros
     *
     * @return self
     */
    public function setTotalRegistros($totalRegistros)
    {
        $this->totalRegistros = $totalRegistros;

        return $this;
    }

    public function calcularQuantidadePaginas(int $quantidade)
    {
        if ($quantidade > 0 && $this->getTotalRegistros()) {
            $this->setQuantidadePaginas(ceil($this->getTotalRegistros() / $quantidade));
        } else {
            $this->setQuantidadePaginas(1);
        }
    }
}
