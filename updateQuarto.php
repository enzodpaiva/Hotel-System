<?php
require 'conexao.php';
include_once 'menu.php';
$id = $_POST['id'];
$funcao = mysqli_query($conn, "SELECT * FROM quarto WHERE id_quarto = '" . $id . "';");
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

			<input type="hidden" name="id" value="<?=$id?>" />


                Nome
                <input class="form-control" type="text" name="nome" value="<?=$registro['tipo']?>"></td>




                <br>
                Descricao
                 <input class="form-control" type="text" name="descricao" value="<?=$registro['descricao']?>">

                 <br>

                 Status (1 = ocupado // 0 = vago)
                 <input class="form-control" type="number" name="status" value="<?=$registro['ocupado']?>">

                 <br>


                <input class="btn btn-primary center-block" type="submit" name="Enviar" value="Alterar" />
</form>
          </div>
</body>
</html>
<?php
if(isset($_POST["Enviar"])){
  $tipo = $_POST["nome"];
  $desc = $_POST["descricao"];
  $status = $_POST["status"];

    $quarto = mysqli_query($conn, "UPDATE quarto SET descricao = '$desc', tipo = '$tipo', ocupado = '$status' WHERE id_quarto = '$id'");
    echo "Quarto Alterada";
    header("Location: listarQuarto.php");



}

?>
