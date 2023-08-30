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

$result = mysqli_query($conn, "DELETE  FROM funcionario WHERE id_funcionario = '" . $id . "';");

header("Location: ../listar/listarFuncionario.php");
?>