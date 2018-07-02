<?php

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

if(isset($_GET)){
    $db->query("SELECT destinatario_id, remetente_id FROM mensagem_usuario WHERE id = ?");
    $db->bind(1, $_GET['id']);
    $result = $db->singleResult();

    if($result['destinatario_id'] == $_SESSION['usuario']['id']){
        $db->query("
            UPDATE mensagem_usuario
            SET lida = 1
            WHERE id = ?
        ");
        $db->bind(1, $_GET['id']);
        $db->execute();

        $db->query("
            SELECT username, primeiroNome, ultimoNome, msgPanicoPadrao, dataCriacao FROM usuario
            WHERE id = ?
        ");
        $db->bind(1, $result['remetente_id']);
        $remetente = $db->singleResult();
    }
    else{
        header("Location: ../index.php");
    }
}
else{
    header("Location: ../index.php");
}

?>