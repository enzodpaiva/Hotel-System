<?php
require '../connection/conexao.php';
include_once '../menu.php';
$id = preg_replace("/[^0-9]/", "", $_POST['id']);
$funcao = mysqli_query($conn, "SELECT * FROM funcionario WHERE id_funcionario = '" . $id . "';");
$registro = mysqli_fetch_array($funcao);
?>
<html>

<head>
</head>

<body>
  <div class="container">
    <legend>
      Editar Senha
    </legend>

    <form method="post">

      <input type="hidden" name="id" value="<?=$id?>" />


      <label>Informe sua senha antiga: </label>
      <input type="password" class="form-control" name="senha_antiga" /><br /><br />
      <label>Senha : </label>
      <input type="password" class="form-control" name="senha" /><br /><br />
      <label>Confirmar Senha : </label>
      <input type="password" class="form-control" name="senha_confirm" /><br /><br />
      <input class="btn btn-primary center-block" type="submit" name="Enviar" value="Alterar" />
    </form>
  </div>
</body>

</html>
<?php
if (isset($_POST["Enviar"])) {
    $senha_antiga = md5($_POST['senha_antiga']);
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['senha_confirm'];
    $result = mysqli_query($conn, "SELECT * FROM funcionario WHERE senha_func = '" . $senha_antiga . "';");

    if ($registro = mysqli_fetch_array($result) && $registro["id_funcionario"] == $id) {
        echo 'Os dados que você está inserindo ja existem';
    } else {
        if ($senha_antiga != $registro['senha_func']) {
            if ($senha == $confirmarSenha) {
                $senha = md5($senha);
                $result2 = mysqli_query($conn, "UPDATE funcionario SET senha_func = '$senha' WHERE id_funcionario = '$id' AND senha_func = '$senha_antiga'");
                echo "Atualizado";
                header("Location: ../listar/listarFuncionario.php");
            } else {
                echo 'as senhas nao sao iguais';
            }
        } else {
            echo 'sua senha digitada nao corresponde a senha antiga';
        }
    }
}

?>