<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $fornecedor = $_POST["fornecedor"];
    $valorCompra = $_POST["valorCompra"];
    $valorVenda = $_POST["valorVenda"];
    $quantidade = $_POST["quantidade"];
    $dataCadastro = date("Y-m-d"); // Obtém a data atual no formato MySQL (AAAA-MM-DD)

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

    // Prepara e executa a consulta SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO pecas (nome, fornecedor, valorCompra, valorVenda, quantidade, dataCadastro) VALUES ('$nome', '$fornecedor', '$valorCompra', '$valorVenda', '$quantidade', '$dataCadastro')";
    if ($conn->query($sql) === TRUE) {
        // Exibe uma mensagem de alerta confirmando o sucesso do cadastro
        echo '<script>alert("Peça cadastrada com sucesso!");</script>';
        // Redireciona o usuário de volta para a página de cadastro
        echo '<script>window.location.href = "cadastro.php";</script>';
    } else {
        // Exibe uma mensagem de alerta informando que a peça não foi cadastrada com sucesso
        echo '<script>alert("Peça não cadastrada com sucesso!");</script>';
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
}
?>
