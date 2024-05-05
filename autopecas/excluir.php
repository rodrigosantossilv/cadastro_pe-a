<?php
// Verifica se o ID da peça a ser excluída foi passado via GET
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

    // Prepara a declaração SQL para excluir a peça
    $sql = "DELETE FROM pecas WHERE id = ?";

    // Prepara a instrução
    $stmt = $conn->prepare($sql);

    // Liga os parâmetros
    $stmt->bind_param("i", $_GET['id']);

    // Executa a instrução
    if ($stmt->execute()) {
        // Redireciona de volta para a página de listagem de peças após a exclusão
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao excluir peça: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $stmt->close();
    $conn->close();
} else {
    // Se nenhum ID foi fornecido, exibe uma mensagem de erro
    echo "ID da peça não fornecido.";
}
?>
