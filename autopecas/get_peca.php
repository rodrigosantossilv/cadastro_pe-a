<?php
// Verificar se o ID da peça foi recebido
if(isset($_GET['id'])) {
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

    // Preparar e executar a consulta preparada
    $stmt = $conn->prepare("SELECT nome, valorVenda FROM pecas WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se a peça foi encontrada
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Retornar os dados da peça como JSON
        echo json_encode($row);
    } else {
        echo "Peça não encontrada";
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
} else {
    echo "ID da peça não especificado";
}
?>
