<?php
require 'conexao.php';
include_once 'menu.php';
?>
<html>

<head>
</head>

<body>
  <div class="container">
    <div class="col-md-auto">
      <form method="post" id="formcad" name="formcad">
        <label>Tipo de Quarto : </label>
        <input type="text" class="form-control" name="tipoQuarto" /> <br /><br />
        <label>Descrição: </label>
        <input type="text" class="form-control" name="descricao" /><br /><br />
        <input type="submit" class="btn btn-primary mb-2 center-block btn-lg" name="Enviar" value="Enviar" /><br /><br />
      </form>
    </div>
  </div>
</body>

</html>
<?php
if (isset($_POST["Enviar"])) {
  $tipoQuarto = $_POST["tipoQuarto"];
  $desc = $_POST["descricao"];

  if (empty($tipoQuarto)) {
    echo "Digite todos os dados!";
    exit;
  }

  $result = mysqli_query($conn, "SELECT * FROM quarto WHERE tipo = '" . $tipoQuarto . "';");

  if ($registro = mysqli_fetch_array($result)) {
    echo "Quarto ja existe!";
  } else {
    $quarto = mysqli_query($conn, "INSERT INTO quarto VALUES (DEFAULT, '$desc','$tipoQuarto', '0')");
    echo 'cadastrado';
  }
}
?>