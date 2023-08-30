<?php
require '../connection/conexao.php';
include_once '../menu.php';
?>
<html>

<head>
</head>

<body>
</body>

</html>
<?php

$id = preg_replace("/[^0-9]/", "", $_POST['id']);

$servico = mysqli_query($conn, "DELETE FROM funcao WHERE id_funcao = '" . $id . "';");

header("Location: ../listar/listarFuncao.php");

?>