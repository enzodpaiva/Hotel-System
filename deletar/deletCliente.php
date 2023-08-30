<?php
require '../connection/conexao.php';

?>
<html>

<head>
</head>

<body>
  <form method="post" id="formcad" name="formcad">
    <label>Digite o CPF do cliente que fez o checkout: </label>
    <input type="number" name="clicpf" /> <br /><br />
    <input type="submit" value="Enviar" /><br /><br />
  </form>
</body>

</html>
<?php
$id = preg_replace("/[^0-9]/", "", $_POST['id']);

$result = mysqli_query($conn, "DELETE  FROM hospede WHERE id_hospede = '" . $id . "';");

header("Location: ../listar/listarCliente.php");

?>