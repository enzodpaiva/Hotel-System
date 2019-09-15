<?php
require 'conexao.php';
?><html>

<head>

	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.js" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	</head>
	<title>
		Login
	</title>
</head>

<body>
	<div class="container ">
		<div class="row">
			<div class="col s6 offset-s3">
				<div class="section">
					<legend class="col s6 offset-s3 ">
						<div class="">
							<h4>Seja Bem Vindo!</h4>
						</div>
				</div>
				</legend>
				<div class="section">
					<form action="#" method="post">
						<div class="section">
							<div class="section">
								<div class="section">
									<div class="section">
										<div class="section">


											<div class="section">
												<div class="section">


													<label for="login">
														CPF
													</label>

													<div>
														<input class="form-control" type="text" id="login" name="login">
													</div>



													<label for="senha">
														Senha
													</label>


													<input class="form-control" type="password" id="senha" name="senha">



													<div class="section">
														<div class="col s6 offset-s5 ">
															<input class="btn btn-primary " type="submit" id="enviar" name="enviar" value="Enviar">
														</div>




					</form>
				</div>
			</div>
		</div>
</body>

</html>
<?php
if (isset($_POST["enviar"])) {
	$login = $_POST["login"];
	$senha = $_POST["senha"];

	if (empty($login) || empty($senha)) {
		echo "Digite um login e uma senha!";
		exit;
	}

	$senha = md5($senha);

	$result = mysqli_query($conn, "SELECT * FROM funcionario WHERE cpf_func = '" . $login . "' and senha_func = '" . $senha . "';");

	if ($registro = mysqli_fetch_array($result)) {
		session_start();
		$_SESSION["usuario"]["logado"] = true;
		$_SESSION["usuario"]["login"] = $registro["login"];
		$_SESSION["usuario"]["nome"] = $registro["nome"];
		$_SESSION["usuario"]["gerente"] = $registro["gerente"] == "t" ? true : false;
		header("location: menu.php");
	} else {
		echo "Login e/ou senha incorreto(s)!";
	}

	mysqli_close($conn);
}
