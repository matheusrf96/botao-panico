<?php

require_once "config.php";

require "model/grupo.php";
require "model/mensagem.php";
require "model/usuario.php";

require "db/db.php";

$db = new DB();

require_once "view/entrar.php";

?>