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

	$quarto = mysqli_query($conn, "DELETE FROM reserva WHERE id_reserva = '" . $id . "';");

	header("Location: listarReserva.php");

?>
