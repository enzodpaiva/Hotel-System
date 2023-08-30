<?php
require '../connection/conexao.php';
include_once '../menu.php';
$id = preg_replace("/[^0-9]/", "", $_POST['id']);
$funcao = mysqli_query($conn, "SELECT * FROM convenio WHERE id_convenio = '" . $id . "';");
$registro = mysqli_fetch_array($funcao);
?>
<html>

<head>
</head>

<body>
  <div class="container">
    <legend>
      Editar Convenio
    </legend>

    <form method="post">

      <input type="hidden" name="id" value="<?=$id?>" />


      Nome
      <input class="form-control" type="text" name="nome" value="<?=$registro['nome_conv']?>"></td>




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

    $result = mysqli_query($conn, "SELECT * FROM convenio WHERE nome_conv = '" . $funcao . "';");

    if ($registro = mysqli_fetch_array($result) && $registro["id_convenio"] != $id) {
        echo 'Os dados que você está inserindo ja existem';
    } else {
        $quarto = mysqli_query($conn, "UPDATE convenio SET nome_conv = '$funcao', descricao = '$desc' WHERE id_convenio " . preg_replace("/[^0-9]/", "", $id));
        echo "Convenio Alterada";
        header("Location: ../listar/listarConvenio.php");
    }
}

?>