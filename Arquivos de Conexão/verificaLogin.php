<?php
session_start();
if ($_SESSION["usuario"]["logado"] == false) {
	header("location: index.php");
}
