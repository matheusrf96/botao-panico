<?php

require_once "includes/header.php"; 

if(!isset($_GET)){
    header("location: ../index.php");
}
else{
    $id = $_GET['id'];

    require_once "../control/exibir-alerta.php";
?>
<div class="container">
    <h1><?php echo $remetente['username']; ?> ESTÁ EM APUROS!!!</h1>
    <p>Mensagem: <?php echo $remetente['msgPanicoPadrao']; ?></p>
    <p>Data: <?php echo $remetente['dataCriacao']; ?></p>
</div>

<a href="../index.php">Voltar</a>
<?php 
} 
require_once "../view/includes/footer.php"; 
?>
