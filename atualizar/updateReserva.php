<?php
require '../connection/conexao.php';
include_once '../menu.php';
$id = preg_replace("/[^0-9]/", "", $_POST['id']);
$funcao = mysqli_query($conn, "SELECT * FROM reserva WHERE id_reserva = '" . $id . "';");
$funcao2 = mysqli_query($conn, "SELECT * FROM quarto");
$funcao3 = mysqli_query($conn, "SELECT * FROM servico");
$funcao4 = mysqli_query($conn, "SELECT * FROM hospede");
$funcao5 = mysqli_query($conn, "SELECT * FROM funcionario");
$registro = mysqli_fetch_array($funcao);
?>
<html>

<head>
</head>

<body>
  <div class="container">
    <legend>
      Editar Reserva
    </legend>

    <form method="post" action="" id="formcad" name="formcad">
      <div class="form-group">
        <label>Data de Entrada : </label>
        <input type="date" class="form-control" name="dateEnt" value="<?=$registro['data_entrada']?>" /><br /><br />
        <label>Data Saida : </label>
        <input type="date" class="form-control" name="dateSai" value="<?=$registro['data_saida']?>" /><br /><br />

        <label>Selecione seu quarto</label>

        <select name="quarto" class="form-control">
          <?php foreach ($funcao2 as $quarto):
    $essequarto = $registro['id_quarto'] == $quarto['id_quarto'];
    $selecao = $essequarto ? "selected='selected'" : "";
    ?>
			            <option value="<?=$quarto['id_quarto']?>" <?=$selecao?>><?="Numero do Quarto: " . $quarto['id_quarto'] . "  ////   Tipo de Quarto: " . $quarto['tipo']?>
			            </option>
			          <?php endforeach?>
        </select>

        <br><br>
        <label>Selecione serviço</label>
        <select name="servico" class="form-control">
          <?php foreach ($funcao3 as $servico):
    $esseservico = $registro['id_servico'] == $servico['id_servico'];
    $selecao = $esseservico ? "selected='selected'" : "";
    ?>
			            <option value="<?=$servico['id_servico']?>" <?=$selecao?>><?=$servico['nome_serv']?>
			            </option>
			          <?php endforeach?>
        </select>

        <br><br>

        <label>Selecione seu hospede</label>
        <select name="hospede" class="form-control">
          <?php foreach ($funcao4 as $hospede):
    $essehospede = $registro['id_hospede'] == $hospede['id_hospede'];
    $selecao = $essehospede ? "selected='selected'" : "";
    ?>
			            <option value="<?=$hospede['id_hospede']?>" <?=$selecao?>><?="Nome: " . $hospede['nome_hosp'] . "  ////   CPF: " . $hospede['cpf_hosp']?>
			            </option>
			          <?php endforeach?>
        </select>

        <br /><br />


        <label>Selecione funcionario</label>
        <select name="funcionario" class="form-control">
          <?php foreach ($funcao5 as $funcionario):
    $essefuncionario = $registro['id_funcionario'] == $funcionario['id_funcionario'];
    $selecao = $essefuncionario ? "selected='selected'" : "";
    ?>
			            <option value="<?=$funcionario['id_funcionario']?>" <?=$selecao?>><?="Nome: " . $funcionario['nome_funci'] . "  ////   CPF: " . $funcionario['cpf_func']?>
			            </option>
			          <?php endforeach?>
        </select>

        <br /><br />

        <input type="submit" class="btn btn-primary mb-2 center-block btn-lg" name="Enviar" value="Enviar" /><br /><br />
      </div>
    </form>
  </div>

</html>
<?php
if (isset($_POST["Enviar"])) {
    $dateEnt = $_POST["dateEnt"];
    $dateSai = $_POST["dateSai"];
    $funcionario = $_POST["funcionario"];
    $hospede = $_POST["hospede"];
    $servico = $_POST["servico"];
    $quarto = $_POST["quarto"];

    $result = mysqli_query($conn, "UPDATE reserva SET data_entrada = '$dateEnt', data_saida = '$dateSai', id_funcionario = '$funcionario',
        id_servico = '$servico', id_quarto ='$quarto', id_hospede = '$hospede' WHERE id_reserva = '$id'");
    $result2 = mysqli_query($conn, "UPDATE quarto SET ocupado = '1' WHERE id_quarto = '$quarto'");

    echo 'Alterado';
}

?>