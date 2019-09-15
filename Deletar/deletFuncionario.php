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

$result = mysqli_query($conn, "DELETE  FROM funcionario WHERE id_funcionario = '" . $id . "';");

header("Location: listarFuncionario.php");
?>