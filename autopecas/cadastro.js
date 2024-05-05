// script.js

document.addEventListener('DOMContentLoaded', function() {
    // Formulário de cadastro de peças
    const formCadastro = document.getElementById('formCadastro');
    formCadastro.addEventListener('submit', function(event) {
        event.preventDefault();
        cadastrarPeca();
    });

    // Formulário de venda
    const formVenda = document.getElementById('formVenda');
    formVenda.addEventListener('submit', function(event) {
        event.preventDefault();
        realizarVenda();
    });

    // Calcular total na tela de venda
    const valorVendaInput = document.getElementById('valorVenda');
    const quantidadeInput = document.getElementById('quantidade');
    const totalInput = document.getElementById('total');
    valorVendaInput.addEventListener('input', calcularTotal);
    quantidadeInput.addEventListener('input', calcularTotal);
});

function cadastrarPeca() {
    // Implemente a função para cadastrar a peça no backend (PHP/MySQL)
}

function realizarVenda() {
    // Implemente a função para realizar a venda no backend (PHP/MySQL)
}

function calcularTotal() {
    const valorVenda = parseFloat(document.getElementById('valorVenda').value);
    const quantidade = parseInt(document.getElementById('quantidade').value);
    const total = valorVenda * quantidade;
    document.getElementById('total').value = total.toFixed(2);
}
