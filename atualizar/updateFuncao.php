<?php
require '../connection/conexao.php';
include_once '../menu.php';
$id = preg_replace("/[^0-9]/", "", $_POST['id']);
$funcao = mysqli_query($conn, "SELECT * FROM funcao WHERE id_funcao = '" . $id . "';");
$registro = mysqli_fetch_array($funcao);
?>
<html>

<head>
</head>

<body>
  <div class="container">
    <legend>
      Editar Funções dos Funcionarios
    </legend>

    <form method="post">

      <input type="hidden" name="id" value="<?=$id?>">


      Nome
      <input class="form-control" type="text" name="nome" value="<?=$registro['nome_func']?>"></td>




      <br>
      Descricao
      <input class="form-control" type="text" name="descricao" value="<?=$registro['descricao']?>">

      <br>


      <input class="btn btn-primary center-block" type="submit" name="Enviar" value="Alterar" />
    </form>
  </div>
</body>

</html>
<?php
if (isset($_POST["Enviar"])) {
    $funcao = $_POST["nome"];
    $desc = $_POST["descricao"];

    $result = mysqli_query($conn, "SELECT * FROM funcao WHERE nome_func = '" . $funcao . " AND descricao = '" . $desc . "';");

    if ($registro = mysqli_fetch_array($result) && $registro["id_funcao"] != $id) {
        echo 'Os dados que você está inserindo ja existem';
    } else {
        $quarto = mysqli_query($conn, "UPDATE funcao SET nome_func = '$funcao', descricao = '$desc' WHERE id_funcao = " . preg_replace("/[^0-9]/", "", $id));
        echo "Função Alterada";
        header("Location: ../listar/listarFuncao.php");
    }
}

?>