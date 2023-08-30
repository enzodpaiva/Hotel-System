<?php
require "connection/verificaLogin.php";
?>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
  <?php ?>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Controle de Hospedagem</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="../menu.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cadastrar
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../cadastrar/cadFuncao.php">Funcao</a></li>
            <li><a href="../cadastrar/cadQuarto.php">Quarto</a></li>
            <li><a href="../cadastrar/cadServico.php">Servico</a></li>
            <li><a href="../cadastrar/cadFuncionario.php">Funcionario</a></li>
            <li><a href="../cadastrar/cadHospede.php">Hospede</a></li>
            <li><a href="../cadastrar/cadReserva.php">Reserva</a></li>
            <li><a href="../cadastrar/cadConvenio.php">Convenio</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Listar
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../listar/listarCliente.php">Hospede</a></li>
            <li><a href="../listar/listarConvenio.php">Convenio</a></li>
            <li><a href="../listar/listarFuncao.php">Funcao</a></li>
            <li><a href="../listar/listarFuncionario.php">Funcionario</a></li>
            <li><a href="../listar/listarQuarto.php">Quarto</a></li>
            <li><a href="../listar/listarServico.php">Servico</a></li>
            <li><a href="../listar/listarReserva.php">Reserva</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Relatorios
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../relatorios/relatorio1.php">Relatorio 1</a></li>
            <li><a href="../relatorios/relatorio2.php">Relatorio 2</a></li>
          </ul>
        </li>
        <li>
          <a href="../connection/sair.php">Sair</a>
        </li>
      </ul>
    </div>
  </nav>
  </div>
</body>

</html>

<?php

?>