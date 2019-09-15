<?php
require 'conexao.php';
include_once 'menu.php';
?>
<html>

<head>
	<title>
		Listar Quarto
	</title>
</head>

<body>
	<div class="container">
		<fieldset>
			<legend>
				Listar Quartos
			</legend>
			<table class="table table-bordered table-dark">
				<tr>
					<th scope="col">N-Quarto</th>
					<th scope="col">
						Tipo
					</th>
					<th scope="col">
						Descrição
					</th>
					<th scope="col">
						Status
					</th>
					<th>
						Deletar
					</th>
					<th>
						Atualizar
					</th>
				</tr>
				<?php

				$result = mysqli_query($conn, "SELECT * FROM quarto");


				while ($registro = mysqli_fetch_array($result)) {
					echo "<tr>";
					echo "<td>" . $registro["id_quarto"] . "</td>";
					echo "<td>" . $registro["tipo"] . "</td>";
					echo "<td>" . $registro["descricao"] . "</td>";
					echo "<td>" . (($registro["ocupado"] == 0) ? 'Vago' : 'Ocupado') . "</td>";
					echo "<td> <form action='deletQuarto.php' method='post'>
				             <input type='hidden' name='id' value=" . $registro['id_quarto'] . "/>
							<button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> remover</button></form>
							</td>";
					echo "<td> <form action='updateQuarto.php' method='post'>
				             <input type='hidden' name='id' value=" . $registro['id_quarto'] . "/>
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