<?php

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

if(isset($_GET['id']) && isset($_GET['resp'])){
    $id = $_GET['id'];
    $resposta = $_GET['resp'];

    echo $id."<br />";
    echo $resposta."<br />";

    $db->query("
        UPDATE usuario_grupo
        SET membroAceito = '".$resposta."'
        WHERE id = ".$id."
    ");

    $db->execute();
}
else{
    echo "Nenhum parâmetro encontrado";
}
?>