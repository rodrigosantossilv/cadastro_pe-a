<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Venda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="telavenda.css">
</head>
<body>
    <div id="telaVenda" class="container mt-5">
        <h2 class="mb-4">Tela de Venda</h2>
        <form id="formVenda" action="venda.php" method="post">
            <div class="mb-3">
                <label for="codPeca" class="form-label">Código da Peça:</label>
                <input type="text" id="codPeca" name="codPeca" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nomePeca" class="form-label">Nome da Peça:</label>
                <input type="text" id="nomePeca" name="nomePeca" class="form-control" readonly>
            </div>
            <div class="mb-3">
                <label for="valorVenda" class="form-label">Valor de Venda:</label>
                <input type="number" id="valorVenda" name="valorVenda" class="form-control" step="0.01" readonly>
            </div>
            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade:</label>
                <input type="number" id="quantidade" name="quantidade" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="total" class="form-label">Total:</label>
                <input type="text" id="total" name="total" class="form-control" readonly>
            </div>
            <button type="button" class="btn btn-primary" onclick="calcularTotal()">Calcular Total</button>
            <button type="submit" class="btn btn-primary">Vender</button>
        </form>

        <!-- Histórico de Vendas -->
        <div class="mt-5">
            <h3>Histórico de Vendas</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Data da Venda</th>
                        <th>Nome da Peça</th>
                        <th>Valor de Compra</th>
                        <th>Valor de Venda</th>
                        <th>Fornecedor</th> <!-- Nova coluna para exibir o fornecedor -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Conectar ao banco de dados
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "cadastro_pecas";

                    $conn = new mysqli($servername, $username, $password, $database);

                    // Verificar a conexão
                    if ($conn->connect_error) {
                        die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
                    }

                    // Consulta SQL para obter o histórico de vendas
                    $sql = "SELECT * FROM pecas";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Exibir os resultados em uma tabela HTML
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['dataCadastro'] . "</td>";
                            echo "<td>" . $row['nome'] . "</td>";
                            echo "<td>" . $row['valorCompra'] . "</td>";
                            echo "<td>" . $row['valorVenda'] . "</td>";
                            echo "<td>" . $row['fornecedor'] . "</td>"; // Exibindo o nome do fornecedor
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Nenhum registro encontrado</td></tr>";
                    }

                    // Fechar a conexão com o banco de dados
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function calcularTotal() {
            var valorVenda = parseFloat(document.getElementById('valorVenda').value);
            var quantidade = parseInt(document.getElementById('quantidade').value);
            var total = valorVenda * quantidade;
            document.getElementById('total').value = total.toFixed(2);
        }
    </script>
<script>
    function buscarInfoPeca() {
        var codPeca = document.getElementById('codPeca').value;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'buscar_peca.php?codPeca=' + codPeca, true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                var resposta = JSON.parse(xhr.responseText);
                if (resposta.success) {
                    document.getElementById('nomePeca').value = resposta.nomePeca;
                    document.getElementById('valorVenda').value = resposta.valorVenda;
                    document.getElementById('quantidade').focus(); // Muda o foco para o campo de quantidade
                } else {
                    alert(resposta.message);
                }
            }
        };
        xhr.send();
    }
</script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  
</body>
</html>
