<?php

class Mensagem{
    private $id;
    private $titulo;
    private $mensagem;
    private $nivel;
    private $dataCriacao;

    public function __construct($titulo, $mensagem, $nivel){
        #definir id
        if(strlen($titulo) >= 45){
            $this->titulo = substr($titulo, 0, 41) + "...";
        }
        else{
            $this->titulo = $titulo;
        }

        if(strlen($mensagem >= 2000)){
            $this->mensagem = substr($mensagem, 0, 1996)."...";
        }
        else{
            $this->mensagem = $mensagem;
        }

        if($nivel >= 0 && $nivel < 3){
            $this->nivel = $nivel;
        }
        else{
            $this->nivel = 0;
        }

        $this->dataCriacao = (new \DateTime())->format('Y-m-d H:i:s');
    }    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }    

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        if(strlen($titulo) >= 45){
            $this->titulo = substr($titulo, 0, 41) + "...";
        }
        else{
            $this->titulo = $titulo;
        }


        return $this;
    }

    /**
     * Get the value of mensagem
     */ 
    public function getMensagem()
    {
        return $this->mensagem;
    }
    public function setMensagem($mensagem)
    {
        if(strlen($mensagem >= 2000)){
            $this->mensagem = substr($mensagem, 0, 1996)."...";
        }
        else{
            $this->mensagem = $mensagem;
        }

        return $this;
    }

    /**
     * Get the value of nivel
     */ 
    public function getNivel()
    {
        return $this->nivel;
    }
    public function setNivel($nivel)
    {
        if($nivel >= 0 && $nivel < 3){
            $this->nivel = $nivel;
        }
        else{
            $this->nivel = 0;
        }

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