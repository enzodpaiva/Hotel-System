<?php
require 'conexao.php';
include_once 'menu.php';
?>
<html>

<head>
</head>

<body>
	<div class="container">
		<fieldset>
			<legend>
				Listar Funcionarios
			</legend>
			<table class="table table-bordered table-dark">
				<tr>
					<th>
						ID Funcionario
					</th>
					<th>
						Nome
					</th>
					<th>
						Cpf
					</th>
					<th>
						Funcao
					</th>
					<th>
						E-mail
					</th>
					<th>
						Telefone
					</th>
					<th>
						Endereço
					</th>
					<th>
						Sexo
					</th>
					<th>
						Deletar
					</th>
					<th>
						Atualizar
					</th>
					<th>
						Mudar Senha
					</th>
				</tr>
				<?php

				$result = mysqli_query($conn, "SELECT * FROM funcionario f INNER JOIN funcao fi on f.id_funcao = fi.id_funcao");

				while ($registro = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>" . $registro["id_funcionario"] . "</td>";
					echo "<td>" . $registro["nome_funci"] . "</td>";
					echo "<td>" . $registro["cpf_func"] . "</td>";
					echo "<td>" . $registro["nome_func"] . "</td>";
					echo "<td>" . $registro["email_func"] . "</td>";
					echo "<td>" . $registro["tel_func"] . "</td>";
					echo "<td>" . $registro["endereco_func"] . "</td>";
					echo "<td>" . $registro["sexo_func"] . "</td>";
					echo "<td> <form action='deletFuncionario.php' method='post'>
				             <input type='hidden' name='id' value=" . $registro['id_funcionario'] . "/>
							<button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> remover</button></form>
							</td>";
					echo "<td> <form action='updateFuncionario.php' method='post'>
					             <input type='hidden' name='id' value=" . $registro['id_funcionario'] . "/>
								<button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span> atualizar</button></form>
								</td>";
					echo "<td> <form action='updateSenha.php' method='post'>
						             <input type='hidden' name='id' value=" . $registro['id_funcionario'] . "/>
									<button class='btn btn-warning'><span class='glyphicon glyphicon-user'></span> Mudar Senha</button></form>
									</td>";
					echo "</tr>";
				}

				mysqli_close($conn);
				?>
			</table>
		</fieldset>
	</div>
</body>

</html>