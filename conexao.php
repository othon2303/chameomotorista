<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "painelcupon";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}