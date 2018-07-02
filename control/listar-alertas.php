<?php

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

$db->query("
    SELECT mensagem_usuario.id,
        usuario.username,
        usuario.msgPanicoPadrao, 
        mensagem_usuario.dataCriacao, 
        mensagem_usuario.lida 
    FROM mensagem_usuario
    INNER JOIN usuario ON mensagem_usuario.remetente_id = usuario.id
    WHERE mensagem_usuario.destinatario_id = ".$_SESSION['usuario']['id']."
    ORDER BY mensagem_usuario.id DESC
");

$alertas = $db->resultSet();

foreach ($alertas as $item) {
    if($item['lida'] == 0){
        $cor = "nao-lida";
    }
    else{
        $cor = "lida";
    }
    ?>

    <li class="alerta-item">
        <a href="../view/alerta.php?id=<?php echo $item['id']; ?>">
            <div class="box-alerta <?php echo $cor; ?>">
                <h5>Alerta de <?php echo $item['username']; ?></h5>
                <p><?php echo $item['msgPanicoPadrao']; ?></p>
                <p><?php echo $item['dataCriacao']; ?></p>
            </div>
        </a>
    </li>

    <?php
}

?>