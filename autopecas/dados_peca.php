<?php
// Arquivo dados_peca.php

// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$database = "cadastro_pecas";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

// Recuperar o código da peça enviado via GET
$codPeca = $_GET['id'];

// Consulta SQL para obter os dados da peça com base no código fornecido
$sql = "SELECT nome, valorVenda FROM pecas WHERE codigo = '$id'";
$result = $conn->query($sql);

// Verificar se a consulta retornou resultados
if ($result->num_rows > 0) {
    // Retornar os dados da peça como JSON
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    // Retornar uma mensagem de erro se não houver resultados
    echo json_encode(array('error' => 'Peça não encontrada'));
}

$conn->close();
?>
