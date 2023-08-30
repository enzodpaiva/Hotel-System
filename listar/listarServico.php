<?php
require '../connection/conexao.php';
include_once '../menu.php';
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
				Listar Serviços
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
						Descrição
					</th>
					<th>
						Deletar
					</th>
					<th>
						Atualizar
					</th>

				</tr>
				<?php
$result = mysqli_query($conn, "SELECT * FROM servico");

while ($registro = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $registro["id_servico"] . "</td>";
    echo "<td>" . $registro["nome_serv"] . "</td>";
    echo "<td>" . $registro["descricao"] . "</td>";
    echo "<td> <form action='../deletar/deletServico.php' method='post'>
				             <input type='hidden' name='id' value=" . $registro['id_servico'] . "/>
							<button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> remover</button></form>
							</td>";
    echo "<td> <form action='../atualizar/updateServico.php' method='post'>
				             <input type='hidden' name='id' value=" . $registro['id_servico'] . "/>
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