<?php
require 'conexao.php';
include_once 'menu.php';
?>
<html>
<head>
</head>
<body>
<div class="container">
<div class="col-md-auto" >
  <form method="post" id="formcad" name="formcad" >
    <label>O nome do serviço a ser cadastrado: </label>
    <input type="text" class="form-control" name="servico" /> <br /><br />
    <label>Descrição: </label>
    <input type="text" class="form-control" name="descricao" /> <br /><br />
    <input type="submit" class="btn btn-primary mb-2 center-block btn-lg" name="Enviar" value="Enviar"/><br /><br />
  </form>
  </div>
  </div>
</body>
</html>
<?php
if(isset($_POST["Enviar"])){
  $servico = $_POST["servico"];
  $desc = $_POST["descricao"];

  if(empty($servico)){
		echo "Digite todos os dados!";
		exit;
  }
  
  $result = mysqli_query($conn, "SELECT * FROM servico WHERE nome_serv = '" . $servico . "';");

  if($registro = mysqli_fetch_array($result)){
		echo "Serviço ja existe!";
	} else {
    $quarto = mysqli_query($conn, "INSERT INTO servico VALUES (DEFAULT, '$servico', '$desc')");
  echo 'cadastrado';
  }
  
}
?>
