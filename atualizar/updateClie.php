<?php
require '../connection/conexao.php';
include_once '../menu.php';
$id = preg_replace("/[^0-9]/", "", $_POST['id']);
$funcao = mysqli_query($conn, "SELECT * FROM hospede WHERE id_hospede = '" . $id . "';");
$funcao2 = mysqli_query($conn, "SELECT * FROM convenio");
$registro = mysqli_fetch_array($funcao);
?>
<html>

<head>
</head>

<body>
  <div class="container">
    <legend>
      Editar Clientes
    </legend>

    <form method="post">

      <input type="hidden" name="id" value="<?=$id?>" />


      Cpf
      <input class="form-control" type="number" name="cpf" value="<?=$registro['cpf_hosp']?>"></td>




      <br>
      Nome
      <input class="form-control" type="text" name="nome" value="<?=$registro['nome_hosp']?>">

      <br>

      Endereço
      <input class="form-control" type="text" name="endereco" value="<?=$registro['endereco_hosp']?>">

      <br>

      Telefone
      <input class="form-control" type="number" name="telefone" value="<?=$registro['tel_hosp']?>">

      <br>

      E-mail
      <input class="form-control" type="email" name="email" value="<?=$registro['email_hosp']?>">

      <br>
      <label>Sexo : </label> <br />
      <?php
if ($registro['sexo_hosp'] == 'feminino') {?>
        <input type="radio" name="sexo" value="masculino" /> masculino <br /><br />
        <input type="radio" name="sexo" value="feminino" checked /> feminino <br /><br />
      <?php } else {?>
        <input type="radio" name="sexo" value="masculino" checked /> masculino <br /><br />
        <input type="radio" name="sexo" value="feminino" /> feminino <br /><br />
      <?php }?>





      <br>

      Nascimento
      <input class="form-control" type="date" name="nascimento" value="<?=$registro['nascimento_hosp']?>">

      <br>

      <label>Convenio Cliente : </label>

      <select name="convenio_hosp" class="form-control">
        <?php foreach ($funcao2 as $convenio):
    $esseconvenio = $registro['convenio_hosp'] == $convenio['id_convenio'];
    $selecao = $esseconvenio ? "selected='selected'" : "";
    ?>
				          <option value="<?=$convenio['id_convenio']?>" <?=$selecao?>><?=$convenio['nome_conv']?>
				          </option>
				        <?php endforeach?>
      </select>



      <br><br>

      <input class="btn btn-primary center-block" type="submit" name="Enviar" value="Alterar" />
    </form>
  </div>
</body>

</html>

<?php
if (isset($_POST["Enviar"])) {
    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $sexo = $_POST["sexo"];
    $nascimento = $_POST["nascimento"];
    $cc = $_POST["convenio_hosp"];

    $result = mysqli_query($conn, "SELECT * FROM hospede WHERE cpf_hosp = '" . $cpf . "';");
    if ($registro = mysqli_fetch_array($result) && $registro["id_hospede"] == $id) {
        echo 'Os dados que você está inserindo pertencem a outras pessoas';
    } else {
        $result = mysqli_query($conn, "UPDATE hospede SET cpf_hosp = '$cpf', nome_hosp = '$nome', endereco_hosp = '$endereco', tel_hosp = '$telefone',
    email_hosp = '$email', sexo_hosp = '$sexo', nascimento_hosp = '$nascimento', convenio_hosp = '$cc' WHERE id_hospede " . preg_replace("/[^0-9]/", "", $id));
        if ($result) {
            echo "Cadastrado com sucesso  <a href='listarCliente.php'>   Clique aqui para voltar </a>";
        }
    }
}
?>