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

$result = mysqli_query($conn, "DELETE FROM quarto WHERE id_quarto = '" . $id . "';");

header("Location: ../listar/listarQuarto.php");

?>