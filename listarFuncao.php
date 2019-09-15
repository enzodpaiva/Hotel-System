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
				Listar Funções dos Funcionarios
			</legend>
			<table class="table table-bordered table-dark">
				<tr>
					<th>
						ID
					</th>
					<th>
						Nome
					</th>
					<th>
						Descricao
					</th>
					<th>
						Deletar
					</th>
					<th>
						Atualizar
					</th>
				</tr>
				<?php
					$result = mysqli_query($conn, "SELECT * FROM funcao");

					while($registro = mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td>" . $registro["id_funcao"] . "</td>";
						echo "<td>" . $registro["nome_func"] . "</td>";
						echo "<td>" . $registro["descricao"] . "</td>";
						echo "<td> <form action='deletFuncao.php' method='post'>
				             <input type='hidden' name='id' value=" .$registro['id_funcao']."/>
							<button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> remover</button></form>
							</td>";
							echo "<td> <form action='updateFuncao.php' method='post'>
					             <input type='hidden' name='id' value=" .$registro['id_funcao']."/>
								<button class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span> atualizar</button></form>
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
