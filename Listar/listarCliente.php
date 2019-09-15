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
				Listar Hospedes
			</legend>
			<table class="table table-bordered table-dark">
				<tr>
					<th>
						ID
					</th>
					<th>
						Cpf
					</th>
					<th>
						Nome
					</th>
					<th>
						Endereço
					</th>
					<th>
						Telefone
					</th>
					<th>
						E-mail
					</th>
					<th>
						Sexo
					</th>
					<th>
						Data de Nascimento
					</th>
					<th>
						Convenio
					</th>
					<th>
						Deletar
					</th>
					<th>
						atualizar
					</th>
				</tr>
				<?php

				$result = mysqli_query($conn, "SELECT * FROM hospede h LEFT JOIN convenio c on h.convenio_hosp = c.id_convenio");

				while ($registro = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>" . $registro["id_hospede"] . "</td>";
					echo "<td>" . $registro["cpf_hosp"] . "</td>";
					echo "<td>" . $registro["nome_hosp"] . "</td>";
					echo "<td>" . $registro["endereco_hosp"] . "</td>";
					echo "<td>" . $registro["tel_hosp"] . "</td>";
					echo "<td>" . $registro["email_hosp"] . "</td>";
					echo "<td>" . $registro["sexo_hosp"] . "</td>";
					echo "<td>" . $registro["nascimento_hosp"] . "</td>";
					echo "<td>" . $registro["nome_conv"] . "</td>";
					echo "<td> <form action='deletCliente.php' method='post'>
				             <input type='hidden' name='id' value=" . $registro['id_hospede'] . "/>
							<button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> remover</button></form>
							</td>";
					echo "<td> <form action='updateClie.php' method='post'>
					             <input type='hidden' name='id' value=" . $registro['id_hospede'] . "/>
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