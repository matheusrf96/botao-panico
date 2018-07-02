<?php

session_start();

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

if(isset($_POST)){
    $alerta = $_POST['alerta'];

    $db->query("
        SELECT usuario.username, usuario_grupo.usuario_id FROM usuario_grupo
        INNER JOIN usuario ON usuario_grupo.usuario_id = usuario.id
        WHERE usuario_grupo.membroAceito = 'A'
        AND usuario.usuarioAtivo = 1
        AND usuario_grupo.usuario_solicitante = ".$_SESSION['usuario']['id']."
        And usuario_grupo.admin = 0
    ");

    if($resultSet = $db->resultSet()){
        print_r($resultSet);

        foreach ($resultSet as $item) {
            $db->query("
                INSERT INTO mensagem_usuario(remetente_id, destinatario_id, lida, dataCriacao) VALUES
                (".$_SESSION['usuario']['id'].", ".$item['usuario_id'].", 0, NOW())
            ");

            $db->execute();
        }

        echo "<b>A operação foi realizada com sucesso!</b><br /><br />
            Se você não for redirecionado
            <a href='../view/main.php'> clique aqui</a>!
        ";

        header("refresh:3;url=../index.php");
    }
    else{
        echo "Nenhum contato encontrado. Adicione mais contatos para poder enviar um alerta.";
        header("refresh:3;url=../index.php");
    }
}

?>