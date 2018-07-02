<?php

class Usuario{
    private $id;
    private $username;
    private $email;
    private $senha;
    private $primeiroNome;
    private $ultimoNome;
    private $msgPanico;
    private $usuarioAtivo;
    private $dataCriacao;
    private $caminhoFotoPerfil;

    public function __construct($user, $email, $senha){
        // definir id

        if(strlen($user) > 0 && strlen($user) < 45){
            $this->username = $user;
        }

        $this->email = $email;
        $this->senha = md5($senha);
        $this->msgPanico = "Socorro!";
        $this->usuarioAtivo = 1;
        //definir caminho da foto

    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        if(strlen($username) > 0 && strlen($username) < 45){
            $this->$username = $username;
        }

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha)
    {
        $this->senha = md5($senha);

        return $this;
    }


    public function getPrimeiroNome()
    {
        return $this->primeiroNome;
    }
    public function setPrimeiroNome($primeiroNome)
    {
        if(strlen($primeiroNome) >= 45){
            $this->primeiroNome = substr($primeiroNome, 0, 44);
        }
        else{
            $this->primeiroNome = $primeiroNome;
        }

        return $this;
    }

    public function getUltimoNome()
    {
        return $this->ultimoNome;
    }
    public function setUltimoNome($ultimoNome)
    {
        if(strlen($ultimoNome) >= 45){
            $this->ultimoNome = substr($ultimoNome, 0, 44);
        }
        else{
            $this->ultimoNome = $ultimoNome;
        }

        return $this;
    }

    public function getMsgPanico()
    {
        return $this->msgPanico;
    }
    public function setMsgPanico($msgPanico)
    {
        $this->msgPanico = $msgPanico;

        return $this;
    }

    public function getUsuarioAtivo()
    {
        return $this->usuarioAtivo;
    }
    public function setUsuarioAtivo($usuarioAtivo)
    {
        $this->usuarioAtivo = $usuarioAtivo;

        return $this;
    }

    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    public function getCaminhoFotoPerfil()
    {
        return $this->caminhoFotoPerfil;
    }
    public function setCaminhoFotoPerfil($caminhoFotoPerfil)
    {
        $this->caminhoFotoPerfil = $caminhoFotoPerfil;

        return $this;
    }

    public function toString(){
        return "
            Username: ".$this->getUsername()."<br />
            E-mail: ".$this->getEmail()."<br />
            Senha(MD5): ".$this->getSenha()."<br />
            Primeiro Nome: ".$this->getPrimeiroNome()."<br />
            Último Nome: ".$this->getUltimoNome()."<br />
            Mensagem de Pânico: ".$this->getMsgPanico()."<br />
            Usuário Ativo: ".$this->getUsuarioAtivo()."<br />
            Data de Criação: ".$this->getDataCriacao()."<br />
            Caminho da Foto de Perfil: ".$this->getCaminhoFotoPerfil()."<br />
        ";
    }
}

?>