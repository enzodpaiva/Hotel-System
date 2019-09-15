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

  $result = mysqli_query($conn, "DELETE FROM quarto WHERE id_quarto = '" . $id . "';");

header("Location: listarQuarto.php");


?>
