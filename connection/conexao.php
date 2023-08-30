<?php
$servidor = "localhost:3306";
$usuario = "root";
$senha = "root";
$dbname = "mydb";
//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if (!$conn) {
    die("Falha na conexao: " . mysqli_connect_error());
} else {
    echo "";
}
