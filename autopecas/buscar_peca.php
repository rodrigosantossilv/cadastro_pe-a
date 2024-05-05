<?php
// Arquivo buscar_peca.php

// Conectar ao banco de dados (substitua pelos seus dados de conexão)
$servername = "localhost";
$username = "root";
$password = "";
$database = "cadastro_pecas";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die(json_encode(array('success' => false, 'message' => 'Erro ao conectar ao banco de dados')));
}

// Recuperar o código da peça enviado via GET
$codPeca = $_GET['codPeca'];

// Consulta SQL para obter as informações da peça com o código fornecido
$sql = "SELECT nome, valorVenda FROM pecas WHERE codPeca = '$codPeca'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(array('success' => true, 'nomePeca' => $row['nome'], 'valorVenda' => $row['valorVenda']));
} else {
    echo json_encode(array('success' => false, 'message' => 'Peça não encontrada'));
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
