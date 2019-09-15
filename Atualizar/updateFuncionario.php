<?php
require 'conexao.php';
include_once 'menu.php';
$id = $_POST['id'];
$funcao = mysqli_query($conn, "SELECT * FROM funcionario WHERE id_funcionario = '" . $id . "';");
$funcao2 = mysqli_query($conn, "SELECT * FROM funcao");
$registro = mysqli_fetch_array($funcao);
?>
<html>

<head>
</head>

<body>
  <div class="container">
    <legend>
      Editar Funcionario
    </legend>

    <form method="post">

      <input type="hidden" name="id" value="<?= $id ?>" />


      Cpf
      <input class="form-control" type="number" name="cpf" value="<?= $registro['cpf_func'] ?>"></td>




      <br>
      Nome
      <input class="form-control" type="text" name="nome" value="<?= $registro['nome_funci'] ?>">

      <br>

      Endereço
      <input class="form-control" type="text" name="endereco" value="<?= $registro['endereco_func'] ?>">

      <br>

      Telefone
      <input class="form-control" type="number" name="telefone" value="<?= $registro['tel_func'] ?>">

      <br>

      E-mail
      <input class="form-control" type="email" name="email" value="<?= $registro['email_func'] ?>">

      <br>

      <label>Sexo : </label> <br />
      <?php
      if ($registro['sexo_func'] == 'feminino') { ?>
        <input type="radio" name="sexo" value="masculino" /> masculino <br /><br />
        <input type="radio" name="sexo" value="feminino" checked /> feminino <br /><br />
      <?php } else { ?>
        <input type="radio" name="sexo" value="masculino" checked /> masculino <br /><br />
        <input type="radio" name="sexo" value="feminino" /> feminino <br /><br />
      <?php } ?>

      <br>

      Nascimento
      <input class="form-control" type="date" name="nascimento" value="<?= $registro['nascimento_func'] ?>">

      <br>

      <label>Tipo de Funcionario : </label>

      <select name="id_funcao" class="form-control">
        <?php foreach ($funcao2 as $funcao) :
          $essafuncao = $registro['id_funcao'] == $funcao['id_funcao'];
          $selecao = $essafuncao ? "selected='selected'" : "";
          ?>
          <option value="<?= $funcao['id_funcao'] ?>" <?= $selecao ?>><?= $funcao['nome_func'] ?>
          </option>
        <?php endforeach ?>
      </select>


      <br /><br />


      <input class="btn btn-primary center-block" type="submit" name="Enviar" value="Alterar" />
    </form>
  </div>
</body>

</html>

<?php
if (isset($_POST["Enviar"])) {
  $tipoFunc = $_POST['id_funcao'];
  $cpf = $_POST['cpf']; //criar forms automaticos para funcao e criar cadFuncao
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $endereco = $_POST['endereco'];
  $sexo = $_POST['sexo'];
  $nascimento = $_POST['nascimento'];


  $result = mysqli_query($conn, "SELECT * FROM funcionario WHERE cpf_func = '" . $cpf . "';");

  if ($registro = mysqli_fetch_array($result) && $registro["id_funcionario"] == $id) {
    echo 'Os dados que você está inserindo ja existem';
  } else {
    $result = mysqli_query($conn, "UPDATE funcionario SET id_funcao = '$tipoFunc', cpf_func = '$cpf', nome_funci = '$nome', endereco_func = '$endereco', tel_func = '$telefone',
        email_func = '$email', sexo_func = '$sexo', nascimento_func = '$nascimento' WHERE id_funcionario = '$id'");
    echo "Atualizado";
    if ($result) {
      echo "Cadastrado com sucesso  <a href='listarFuncionario.php'>   Clique aqui para voltar </a>";
    }
  }
}
?>