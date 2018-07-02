<?php

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

// echo "ID Usuário: ".$_SESSION['usuario']['id']."<br />";
// echo "Grupo Padrão: ".$_SESSION['usuario']['grupoPadrao']."<br />";

$db->query("
    SELECT usuario_grupo.id, usuario.username, grupo.nomeGrupo FROM usuario_grupo
    INNER JOIN usuario ON usuario_grupo.usuario_solicitante = usuario.id
    INNER JOIN grupo ON usuario_grupo.grupo_id = grupo.id
    WHERE usuario_grupo.membroAceito = 'P'
    AND usuario_grupo.grupo_id != ".$_SESSION['usuario']['grupoPadrao']."
    AND usuario_grupo.usuario_id = ".$_SESSION['usuario']['id']."
");

$solicitacoes = $db->resultSet();

?>

<div id="log"></div>
<ul>
<?php
foreach ($solicitacoes as $item) { ?>
    <li>
        Você recebeu uma solicitação para os contatos de <?php echo $item['username']; ?>. Deseja aceitar?
        <button id="aceitar-sol" onClick="updateSolicitacao(<?php echo $item['id']; ?> , 'A')">Aceitar</button>
        <button id="recusar-sol" onClick="updateSolicitacao(<?php echo $item['id']; ?> , 'R')">Recusar</button>
    </li>
<?php } ?>
</ul>

<?php

#print_r($solicitacoes);

?>