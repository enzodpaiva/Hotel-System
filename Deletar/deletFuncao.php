<?php
require 'conexao.php';
include_once 'menu.php';
?>
<html>

<head>
</head>

<body>
</body>

</html>
<?php

$id = $_POST['id'];

$servico = mysqli_query($conn, "DELETE FROM funcao WHERE id_funcao = '" . $id . "';");

header("Location: listarFuncao.php");

?>