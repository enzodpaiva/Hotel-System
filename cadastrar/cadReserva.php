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
      <div class="">
        <form method="post" action="" id="formcad" name="formcad">
          <div class="form-group">
            <label>Data de Entrada : </label>
            <input type="date" class="form-control" name="dateEnt" /><br /><br />
            <label>Data Saida : </label>
            <input type="date" class="form-control" name="dateSai" /><br /><br />
            <label>Selecione seu quarto</label>
            <select class="form-control" name="quarto">
              <?php
$quarto = array();
$sql = "SELECT * FROM quarto where ocupado = 0";
if ($result = mysqli_query($conn, $sql)) {
    $func = $result->fetch_all(MYSQLI_ASSOC);
    mysqli_free_result($result);
}
$temas = $func;
foreach ($temas as $tema) {
    echo "<option value=" . $tema['id_quarto'] . ">" . " Numero: " . $tema['id_quarto'] . " // Tipo: " . $tema['tipo'] . " //Desricao: " . $tema['descricao'] . "</option>";
}
?>
            </select><br /><br />
            <label>Selecione serviço</label>
            <select class="form-control" name="servico">
              <?php
$quarto = array();
$sql = "SELECT * FROM servico";
if ($result = mysqli_query($conn, $sql)) {
    $func = $result->fetch_all(MYSQLI_ASSOC);
    mysqli_free_result($result);
}
$temas = $func;
foreach ($temas as $tema) {
    echo "<option value=" . $tema['id_servico'] . ">" . $tema['nome_serv'] . $tema['descricao'] . "</option>";
}
?>
            </select><br /><br />
            <label>Selecione seu hospede</label>
            <select class="form-control" name="hospede">
              <?php
$quarto = array();
$sql = "SELECT * FROM hospede";
if ($result = mysqli_query($conn, $sql)) {
    $func = $result->fetch_all(MYSQLI_ASSOC);
    mysqli_free_result($result);
}
$temas = $func;
foreach ($temas as $tema) {
    echo "<option value=" . $tema['id_hospede'] . ">" . $tema['nome_hosp'] . " / cpf: " . $tema['cpf_hosp'] . "</option>";
}
?>
            </select><br /><br />
            <label>Selecione funcionario</label>
            <select class="form-control" name="funcionario">
              <?php
$quarto = array();
$sql = "SELECT * FROM funcionario INNER JOIN funcao where nome_func = 'gerente'";
if ($result = mysqli_query($conn, $sql)) {
    $func = $result->fetch_all(MYSQLI_ASSOC);
    mysqli_free_result($result);
}
$temas = $func;
foreach ($temas as $tema) {
    echo "<option value=" . $tema['id_funcionario'] . ">" . $tema['nome_funci'] . "</option>";
}
?>
            </select><br /><br />
            <label>Selecione o convenio</label>
            <select class="form-control" name="convenio">
              <?php
$quarto = array();
$sql = "SELECT * FROM convenio";
if ($result = mysqli_query($conn, $sql)) {
    $func = $result->fetch_all(MYSQLI_ASSOC);
    mysqli_free_result($result);
}
$temas = $func;
foreach ($temas as $tema) {
    echo "<option value=" . $tema['id_convenio'] . ">" . $tema['nome_conv'] . "</option>";
}
?>
            </select><br /><br />
            <input type="submit" class="btn btn-primary mb-2 center-block btn-lg" name="Enviar" value="Enviar" /><br /><br />
          </div>
        </form>
      </div>
    </div>
  </div>

</html>
<?php
if (isset($_POST["Enviar"])) {
    $dateEnt = $_POST["dateEnt"];
    $dateSai = $_POST["dateSai"];
    $convenio = $_POST["convenio"];
    $funcionario = $_POST["funcionario"];
    $hospede = $_POST["hospede"];
    $servico = $_POST["servico"];
    $quarto = $_POST["quarto"];

    if (empty($dateEnt) || empty($hospede) || empty($quarto)) {
        echo "Digite todos os dados!";
        exit;
    }

    $result = mysqli_query($conn, "SELECT * FROM quarto WHERE ocupado = 1");

    if ($registro = mysqli_fetch_array($result)) {
        echo "Quarto em uso!";
    } else {
        $result = mysqli_query($conn, "INSERT INTO reserva VALUES (DEFAULT, '$dateEnt', '$dateSai', '$funcionario',
        '$servico', '$quarto', '$hospede', '$convenio')");
        $result2 = mysqli_query($conn, "UPDATE quarto SET ocupado = '1' WHERE id_quarto = '$quarto'");

        echo 'cadastrado';
    }
}
?>