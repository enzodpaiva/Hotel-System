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

$servico = mysqli_query($conn, "DELETE FROM convenio WHERE id_convenio = '" . $id . "';");

header("Location: listarConvenio.php");

?>