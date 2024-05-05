
<?php
/* 
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

// Consulta SQL para buscar as peças cadastradas
$sql = "SELECT * FROM pecas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output dos dados em forma de tabela HTML
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['fornecedor'] . "</td>";
        echo "<td>" . $row['valorCompra'] . "</td>";
        echo "<td>" . $row['valorVenda'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>Nenhuma peça cadastrada</td></tr>";
}

// Fechar a conexão com o banco de dados
$conn->close();
*/
?>
