<?php

session_start();

require_once "../config.php";
require_once "../db/db.php";
require_once "../model/usuario.php";

$db = new DB();

if(isset($_GET) && isset($_POST)){
    if($_GET['id'] == $_SESSION['usuario']['id']){
        $id = $_GET['id'];

        $username = $_SESSION['usuario']['username'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $user = new Usuario($username, $email, $senha);

        $user->setPrimeiroNome($_POST['pNome']);
        $user->setUltimoNome($_POST['uNome']);
        $user->setMsgPanico($_POST['alerta']);
        $user->setCaminhoFotoPerfil($_POST['foto']);

        $sql = "
            UPDATE usuario
            SET 
                email = ?,
                senha = ?,
                primeiroNome = ?,
                ultimoNome = ?,
                msgPanicoPadrao = ?,
                caminhoFotoPerfil = ?
            WHERE id = ?
        ";

        $db->query($sql);
        $db->bind(1, $user->getEmail());
        $db->bind(2, $user->getSenha());
        $db->bind(3, $user->getPrimeiroNome());
        $db->bind(4, $user->getUltimoNome());
        $db->bind(5, $user->getMsgPanico());
        $db->bind(6, $user->getCaminhoFotoPerfil());
        $db->bind(7, $id);

        if($db->execute()){
            echo "Seu perfil foi modificado!";

            $db->query("SELECT * FROM usuario WHERE id = ?");
            $db->bind(1, $id);
            $row = $db->singleResult();

            $db->query("
                SELECT grupo_id FROM usuario_grupo 
                INNER JOIN grupo ON usuario_grupo.grupo_id = grupo.id
                WHERE usuario_grupo.usuario_id = ".$row['id']." 
                AND usuario_grupo.admin = 1
                AND grupo.nomeGrupo = 'Padrao'
            ");
            if($grupo = $db->singleResult()){
                $_SESSION['usuario'] = $row;
                $_SESSION['usuario']['grupoPadrao'] = $grupo['grupo_id'];

                header("refresh:3; url=../view/perfil.php?id=".$id);
            }
        }
        else{
            echo "Ocorreu um erro!";
            echo "<textarea>".$sql."</textarea>";
        }
    }
    else{
        header("location: ../index.php");
    }
}
else{
    header("location: ../index.php");
}

?>