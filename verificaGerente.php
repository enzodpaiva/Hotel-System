<?php
	if(!$_SESSION["usuario"]["gerente"]){
		echo "Voce nao possui permissao para acessar esta pagina!";
		exit;
	}
