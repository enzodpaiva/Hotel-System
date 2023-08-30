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

$quarto = mysqli_query($conn, "DELETE FROM servico WHERE id_servico = '" . $id . "';");

header("Location: ../listar/listarServico.php");

?>