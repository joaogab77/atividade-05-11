<?php
$servidor = "localhost"; 
$usuario = "root"; 
$senha = ""; 
$banco = "db_longavida"; 

// Criando a conexão
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verificando a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

echo "Conexão bem-sucedida!";
?>
