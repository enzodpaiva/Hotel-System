<?php
require 'conexao.php';
include_once 'menu.php';

$id = $_POST['id'];
$funcao = mysqli_query($conn, "SELECT * FROM servico WHERE id_servico = '" . $id . "';");
$registro = mysqli_fetch_array($funcao);
?>
<html>

<head>
</head>

<body>
  <div class="container">
    <legend>
      Editar Quarto
    </legend>

    <form method="post">

      <input type="hidden" name="id" value="<?= $registro['id_servico'] ?>" />


      Nome
      <input class="form-control" type="text" name="nome" value="<?= $registro['nome_serv'] ?>"></td>




      <br>
      Descricao
      <input class="form-control" type="text" name="descricao" value="<?= $registro['descricao'] ?>">

      <br>



      <input class="btn btn-primary center-block" type="submit" name="Enviar" value="Alterar" />
    </form>
  </div>
</body>

</html>
<?php
if (isset($_POST["Enviar"])) {
  $nome = $_POST["nome"];
  $desc = $_POST["descricao"];

  $quarto = mysqli_query($conn, "UPDATE servico SET nome_serv = '$nome', descricao = '$tipo' WHERE id_servico = '$id'");
  echo "Serviço Alterado";
  header("Location: listarServico.php");
}

?>