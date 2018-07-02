<?php 

require_once "includes/header.php"; 

if(isset($_SESSION['usuario'])){ ?>

    <p>Hello, <a href="perfil.php?id=<?php echo $_SESSION['usuario']['id']; ?>"><?php echo $_SESSION['usuario']['username']; ?></a>! <a href="../control/logout.php">Logout</a></p>

    <div class="row">
        <div class="col">
            <h3>Enviar Alerta:</h3>

            <form action="../control/enviar-alerta.php" method="POST">
                <input type="hidden" name="alerta" id="alerta" value="<?php echo $_SESSION['usuario']['msgPanicoPadrao']; ?>" />
                <input type="submit" value="Enviar" />
            </form>

            <br />
            <h3>Lista de alertas:</h3>

            <ul>
                <?php require_once "../control/listar-alertas.php"; ?>
            </ul>
        </div>
        <div class="col">
            <h3>Lista de contatos:</h3>

            <form action="../control/adicionar-contato.php" method="POST">
                <input type="text" name="contato" id="contato" placeholder="Usuário a ser adicionado" />
                <input type="hidden" name="grupo" id="grupo" value="<?php echo $_SESSION['usuario']['grupoPadrao']; ?>" />
                <input type="submit" value="Adicionar" />
            </form>

            <br />

            <?php require_once "../control/listar-contatos.php"; ?>
        </div>
        <!-- <div class="col">
            <h3>Solicitação de contatos: </h3>
            <?php require_once "../control/solicitacoes-pendentes.php"; ?>
        </div> -->
    </div>

<?php 
}
else{   
    header('Location: ../index.php');
} 
?>

<?php require_once "includes/footer.php"; ?>