<?php

class Grupo{
    private $id;
    private $nomeGrupo;
    private $descricao;
    private $codigoGrupo;
    private $grupoAtivo;
    private $dataCriacao;

    public function __construct($nomeGrupo, $descricao){
        #definir id
        if(strlen($nomeGrupo) < 45){
            $this->nomeGrupo = $nomeGrupo;
        }

        if(strlen($descricao >= 255)){
            $this->descricao = substr($descricao, 0, 255);
        }
        else{
            $this->descricao = $descricao;
        }

        $this->codigoGrupo = $this->id."-".rand(1000, 9999);
        $this->grupoAtivo = TRUE;
        $this->dataCriacao = (new \DateTime())->format('Y-m-d H:i:s');
    }

    public function getId()
    {
        return $this->id;
    }    

    /**
     * Get the value of nomeGrupo
     */ 
    public function getNomeGrupo()
    {
        return $this->nomeGrupo;
    }
    public function setNomeGrupo($nomeGrupo)
    {
        if(strlen($nomeGrupo) < 45){
            $this->nomeGrupo = $nomeGrupo;
        }

        return $this;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao)
    {
        if(strlen($descricao >= 255)){
            $this->descricao = substr($descricao, 0, 255);
        }
        else{
            $this->descricao = $descricao;
        }

        return $this;
    }

    /**
     * Get the value of codigoGrupo
     */ 
    public function getCodigoGrupo()
    {
        return $this->codigoGrupo;
    }
    public function setCodigoGrupo($codigoGrupo)
    {
        $this->codigoGrupo = $codigoGrupo;

        return $this;
    }

    /**
     * Get the value of grupoAtivo
     */ 
    public function getGrupoAtivo()
    {
        return $this->grupoAtivo;
    }
    public function setGrupoAtivo($grupoAtivo)
    {
        $this->grupoAtivo = $grupoAtivo;

        return $this;
    }

    /**
     * Get the value of dataCriacao
     */ 
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }
}
?>