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
				Listar Reservas
			</legend>
			<table class="table table-bordered table-dark">
				<tr>
					<th>
						ID Reserva
					</th>
					<th>
						Data de Entrada
					</th>
					<th>
						Data de Saida
					</th>
					<th>
						Nome do Funcionario que Cadastrou o Cliente
					</th>
					<th>
						Serviço Ultilzado pelo Cliente
					</th>
					<th>
						Numero do Quarto
					</th>
					<th>
						Nome do Hospede
					</th>
					<th>
						Convenio Ultilzado
					</th>
					<th>
						Deletar
					</th>
					<th>
						Atualizar
					</th>
				</tr>
				<?php

					$result = mysqli_query($conn, "SELECT * FROM reserva r INNER JOIN funcionario f on f.id_funcionario = r.id_funcionario INNER JOIN servico s on s.id_servico = r.id_servico INNER JOIN quarto q on q.id_quarto = r.id_quarto INNER JOIN hospede h on h.id_hospede = r.id_hospede INNER JOIN convenio c on c.id_convenio = r.id_convenio");

					while($registro = mysqli_fetch_array($result)){
						echo "<tr>";
                        echo "<td>" . $registro["id_reserva"] . "</td>";
                        echo "<td>" . $registro["data_entrada"] . "</td>";
						echo "<td>" . $registro["data_saida"] . "</td>";
						echo "<td>" . $registro["nome_funci"] . "</td>";
						echo "<td>" . $registro["nome_serv"] . "</td>";
                        echo "<td>" . $registro["id_quarto"] . "</td>";
                        echo "<td>" . $registro["nome_hosp"] . "</td>";
						echo "<td>" . $registro["nome_conv"] . "</td>";
						echo "<td> <form action='deletReserva.php' method='post'>
				             <input type='hidden' name='id' value=" .$registro['id_reserva']."/>
							<button class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span> remover</button></form>
							</td>";
							echo "<td> <form action='updateReserva.php' method='post'>
				             <input type='hidden' name='id' value=" .$registro['id_reserva']."/>
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
