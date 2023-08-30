<?php
require '../connection/conexao.php';
include_once '../menu.php';
?>
<html>

<head>
</head>

<body>
  <div class="container">
    <div class="col-md-auto">
      <form method="post" id="formcad" name="formcad">
        <label>O nome do Convenio a ser cadastrado: </label>
        <input type="text" class="form-control" name="convenio" /> <br /><br />
        <label>Descrição: </label>
        <input type="text" class="form-control" name="descricao" rows="3" /> <br /><br />
        <input type="submit" class="btn btn-primary mb-2 center-block btn-lg" name="Enviar" value="Enviar" /><br /><br />
      </form>
</body>
</div>
</div>

</html>
<?php
if (isset($_POST["Enviar"])) {
    $convenio = $_POST["convenio"];
    $desc = $_POST["descricao"];

    if (empty($convenio)) {
        echo "Digite todos os dados!";
        exit;
    }

    $result = mysqli_query($conn, "SELECT * FROM convenio WHERE nome_conv = '" . $convenio . "';");

    if ($registro = mysqli_fetch_array($result)) {
        echo "Serviço ja existe!";
    } else {
        $quarto = mysqli_query($conn, "INSERT INTO convenio VALUES (DEFAULT, '$convenio', '$desc')");
        echo 'cadastrado';
    }
}
?>