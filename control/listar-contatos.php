<?php

require_once "../config.php";
require_once "../db/db.php";

$db = new DB();

$db->query("
    SELECT usuario.username FROM usuario_grupo
    INNER JOIN usuario ON usuario_grupo.usuario_id = usuario.id
    WHERE usuario_grupo.membroAceito = 'A'
    AND usuario.usuarioAtivo = 1
    AND usuario_grupo.usuario_solicitante = ".$_SESSION['usuario']['id']."
    And usuario_grupo.admin = 0
");

$contatos = $db->resultSet();

// $db->query("
//     SELECT usuario.username FROM usuario_grupo
//     INNER JOIN usuario ON usuario_grupo.usuario_id = usuario.id
//     INNER JOIN grupo ON usuario_grupo.grupo_id = grupo.id
//     WHERE usuario_grupo.membroAceito = 'A'
//     AND usuario_grupo.usuario_solicitante = ".$_SESSION['usuario']['id']."
//     AND usuario.id != ".$_SESSION['usuario']['id']."
//     AND usuario.usuarioAtivo = 1
// ");

// $contatos += $db->resultSet();

?>

<h3>Contatos</h3>

<ul>

<?php foreach ($contatos as $item) { ?>
    <li><?php echo $item['username']; ?></li>
<?php } ?>

</ul>