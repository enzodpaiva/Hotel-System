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
      <form method="post" action="#" id="formcad" name="formcad">
        <div class="form-group">
          <label>CPF : </label>
          <input type="number" class="form-control" name="cpf" required /><br /><br />
          <label>NOME : </label>
          <input type="text" class="form-control" name="nome" required /><br /><br />
          <label>Email : </label>
          <input type="email" class="form-control" name="email" /><br /><br />
          <label>Telefone : </label>
          <input type="number" class="form-control" name="telefone" required /><br /><br />
          <label>Endereço : </label>
          <input type="text" class="form-control" name="endereco" /><br /><br />
          <div class="form-check">
            <label class="form-check-label">Sexo : </label><br />
            <input type="radio" name="sexo" class="form-check-input" value="masculino" required checked /> masculino<br /><br />
            <input type="radio" name="sexo" class="form-check-input" value="feminino" required checked /> feminino <br /><br />
          </div>
          <label>Data de Nascimento : </label>
          <input type="date" class="form-control" name="nascimento" /><br /><br />
          <label>Senha : </label>
          <input type="password" class="form-control" name="senha" required /><br /><br />
          <label>Confirmar Senha : </label>
          <input type="password" class="form-control" name="senha_confirm" required /><br /><br />
          <label>Tipo de Funcionario : </label>
          <select class="form-control" name="funcao">
            <option value="0">Selecione a função...</option>
            <?php
$func = array();
$sql = "SELECT * FROM Funcao";
if ($result = mysqli_query($conn, $sql)) {
    $func = $result->fetch_all(MYSQLI_ASSOC);
    mysqli_free_result($result);
}
$temas = $func;
foreach ($temas as $tema) {
    echo "<option value=" . $tema['id_funcao'] . ">" . $tema['nome_func'] . "</option>";
}
?>
          </select><br /><br />
          <input type="submit" class="btn btn-primary mb-2 center-block btn-lg" name="Enviar" value="Enviar" /><br /><br />
        </div>
      </form>
    </div>
  </div>
</body>

</html>
<?php
if (isset($_POST["Enviar"])) {
    $tipoFunc = $_POST['funcao'];
    $cpf = $_POST['cpf']; //criar forms automaticos para funcao e criar cadFuncao
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $sexo = $_POST['sexo'];
    $nascimento = $_POST['nascimento'];
    $senha = $_POST["senha"];
    $confirmarSenha = $_POST["senha_confirm"];

    if (empty($tipoFunc) || empty($cpf) || empty($telefone) || empty($sexo) || empty($senha)) {
        echo "Digite todos os dados!";
        exit;
    }

    $result = mysqli_query($conn, "SELECT * FROM funcionario where cpf_func = '$cpf'");

    if ($registro = mysqli_fetch_array($result)) {
        echo "Usuario ja existe!";
    } else {
        if ($senha == $confirmarSenha) {
            $senha = md5($senha);
            $result2 = mysqli_query($conn, "INSERT INTO funcionario VALUES (DEFAULT,'$tipoFunc' , '$cpf', '$nome', '$endereco', '$telefone', '$email', '$sexo', '$nascimento', '$senha')");
            echo "Cadastrado";
        } else {
            echo "As senhas são iguais!";
        }
    }
}
?>