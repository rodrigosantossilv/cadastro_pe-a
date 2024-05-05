<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Autopeças</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <!-- Cadastro de Peças -->
        <div id="cadastroPecas">
            <h1>Cadastro de Peças</h1>
            <form id="formCadastro" action="cadastro.php" method="post">
                <div class="mb-3">
                    <label for="nome">Nome da Peça:</label>
                    <input type="text" id="nome" name="nome" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="fornecedor">Fornecedor:</label>
                    <input type="text" id="fornecedor" name="fornecedor" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="valorCompra">Valor de Compra:</label>
                    <input type="number" id="valorCompra" name="valorCompra" class="form-control" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="valorVenda">Valor de Venda:</label>
                    <input type="number" id="valorVenda" name="valorVenda" class="form-control" step="0.01" required>
                </div>
                <div class="mb-3">
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" id="quantidade" name="quantidade" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary" onclick="showConfirmation()">Cadastrar Peça</button>
            </form>
        </div>

        <!-- Listagem das Peças Cadastradas -->
        <div id="listaPecas" class="mt-5">
            <h2>Listagem de Peças Cadastradas</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Fornecedor</th>
                        <th>Valor de Compra</th>
                        <th>Valor de Venda</th>
                        <th>Quantidade</th>
                        <th>Data de Cadastro</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody id="tabelaPecas">
                    <?php
                    // Aqui vai o código PHP para listar as peças cadastradas
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
                            echo "<td>" . $row['quantidade'] . "</td>";
                            echo "<td>" . $row['dataCadastro'] . "</td>";
                            echo "<td><a href='excluir.php?id=" . $row['id'] . "' class='btn btn-danger'>Excluir</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>Nenhuma peça cadastrada</td></tr>";
                    }

                    // Fechar a conexão com o banco de dados
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Botão para ir para a tela de venda -->
    <div class="container mt-3">
        <a href="tela_venda.php" class="btn btn-primary">Ir para Tela de Venda</a>
    </div>

    <!-- Script para mostrar a confirmação e recarregar a página -->
    <script>
        function showConfirmation() {
            alert("Peça cadastrada com sucesso!");
            setTimeout(function() {
                location.reload();
            }, 1000); // Recarrega a página após 1 segundo (1000 milissegundos)
        }
    </script>
</body>
</html>
