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
        <label>O nome da função a ser cadastrada: </label>
        <input type="text" class="form-control" name="funcao" require /> <br /><br />
        <label>Descrição: </label>
        <input type="text" class="form-control" name="descricao" /> <br /><br />
        <input type="submit" class="btn btn-primary mb-2 center-block btn-lg" name="Enviar" value="Enviar" /><br /><br />
      </form>
    </div>
  </div>
</body>

</html>
<?php

if (isset($_POST["Enviar"])) {
    $funcao = $_POST["funcao"];
    $desc = $_POST["descricao"];
    if (empty($funcao)) {
        echo "Digite todos os dados!";
        exit;
    }

    $result = mysqli_query($conn, "SELECT * FROM funcao WHERE nome_func = '" . $funcao . "';");
    if ($registro = mysqli_fetch_array($result)) {
        echo "Funcão ja existe!";
    } else {
        $quarto = mysqli_query($conn, "INSERT INTO funcao VALUES (DEFAULT, '$funcao', '$desc')");
        echo "Função Cadastrada";
    }
}

?>