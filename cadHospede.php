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
  <form method="post" action="#" id="formcad" name="formcad" >
    <label>NOME : </label>
    <input type="text" class="form-control" name="nome" require /><br /><br />
    <label>Email : </label>
    <input type="text" class="form-control" name="email"  /><br /><br />
    <label>Telefone : </label>
    <input type="number" class="form-control" name="tel" require /><br /><br />
    <label>Endereço : </label>
    <input type="text" class="form-control" name="endereco"  /><br /><br />
    <label>Data de Nascimento : </label>
    <input type="date" class="form-control" name="date"   /><br /><br />
    <label>Sexo : </label> <br />
    <input type="radio" name="sexo" value="masculino" required checked /> masculino <br /><br />
    <input type="radio" name="sexo" value="feminino" required checked /> feminino <br /><br />
    <label>CPF : </label>
    <input type="number" class="form-control" name="cpf" require /><br /><br />
    <label>Convenio Cliente : </label>
    <select class="form-control" name="convenio">
    <option value="0">Selecione o convenio...</option>
    <?php
    $func = array();
    $sql = "SELECT * FROM convenio";
    if($result = mysqli_query($conn, $sql)){
      $func = $result->fetch_all(MYSQLI_ASSOC);
      mysqli_free_result($result);
    }
    $temas = $func;
		foreach ($temas as $tema) {
			echo "<option value=" . $tema['id_convenio'] . ">" . $tema['nome_conv'] . "</option>";
		}
    ?>
    </select><br /><br />
    <input type="submit" class="btn btn-primary mb-2 center-block btn-lg" name="Enviar" value="Enviar"/><br /><br />
  </form>
</body>
</html>
<?php
if(isset($_POST["Enviar"])){
	$nome = $_POST["nome"];
  $email = $_POST["email"];
	$tel = $_POST["tel"];
  $endereco = $_POST["endereco"];
  $date = $_POST["date"];
  $sexo = $_POST["sexo"];
  $cpf = $_POST["cpf"];
  $convenioCliente = $_POST["convenio"];

  if(empty($cpf) || empty($tel) || empty($sexo)){
		echo "Digite todos os dados!";
		exit;
  }

  $result = mysqli_query($conn, "SELECT * FROM hospede WHERE cpf_hosp = '" . $cpf . "';");

  if($registro = mysqli_fetch_array($result)){
		echo "Usuario ja existe!";
	} else {
    $result = mysqli_query($conn, "INSERT INTO hospede VALUES (DEFAULT, $cpf, '$nome',
      '$endereco', $tel, '$email', '$sexo', '$date', '$convenioCliente')");
      echo 'cadastrado';
  }
}
?>
