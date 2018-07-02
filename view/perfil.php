<?php 
if(!isset($_GET)){
    header("location: ../index.php");
}
else{
    $id = $_GET['id'];

    require_once "includes/header.php"; 
?>

<div class="container">
    <a href="../index.php">Voltar</a>
    <div>
        Foto:
        <img src="<?php echo $_SESSION['usuario']['caminhoFotoPerfil']?>" alt="Foto de Perfil" height="150" width="150"/>
    </div>

    <form action="../control/editar-perfil.php?id=<?php echo $id;?>" method="POST">
        E-mail: <input required type="email" name="email" id="email" value="<?php echo $_SESSION['usuario']['email']?>"/><br />
        Senha: <input required type="password" name="senha" id="senha" /><br />
        Primeiro Nome: <input type="text" name="pNome" id="pNome" value="<?php echo $_SESSION['usuario']['primeiroNome']?>" /><br />
        Último Nome: <input type="text" name="uNome" id="uNome" value="<?php echo $_SESSION['usuario']['ultimoNome']?>" /><br />
        Mensagem de Alerta:<br /> <textarea name="alerta" id="alerta" cols="30" rows="5"><?php echo $_SESSION['usuario']['msgPanicoPadrao']?></textarea><br />
        Foto de Perfil: <input type="file" name="foto" id="foto" accept="image/*" value="<?php echo $_SESSION['usuario']['caminhoFotoPerfil']?> "/><br />
        <input type="submit" value="Salvar">
    </form>
</div>
<?php 
    require_once "includes/footer.php";
}
?>