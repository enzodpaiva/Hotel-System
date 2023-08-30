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

$servico = mysqli_query($conn, "DELETE FROM convenio WHERE id_convenio = '" . $id . "';");

header("Location: ../listar/listarConvenio.php");

?>