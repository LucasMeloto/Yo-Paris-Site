function calcularvenda() {

    // Obtém os valores e substitui vírgulas por pontos
    const precocusto = Number(document.getElementById('preco_custo').value.replace(',', '.'));
    const lucro = Number(document.getElementById('lucro').value.replace(',', '.'));

    // Calcula o preço de venda
    const precovenda = precocusto + (precocusto * lucro / 100);

    // Exibe o resultado, convertendo o virgula para ponto
    document.getElementById('preco_venda').value = precovenda.toFixed(2).replace(',', '.');
}

function calcularpromocao() {

    const precovenda = Number(document.getElementById('preco_venda').value.replace(',', '.'));
    const desconto = Number(document.getElementById('desconto').value.replace(',', '.'));

    const precopromocao = precovenda - (precovenda * desconto / 100);


    document.getElementById('preco_promocao').value = precopromocao.toFixed(2).replace(',', '.');
}

// Radio Buttom

function AtivarCampos() {
    // Verifica se o botão está marcado
    const ativado = document.getElementById('ativado').checked;

    // Seleciona todos os campos com a classe
    const campospromocao = document.querySelectorAll('.ativar_campos');

    // Itera pelos campos e ajusta o atributo disabled
    campospromocao.forEach(campo => {
        campo.disabled = !ativado; // Habilita se radio ativado estiver marcado , desabilita se apertar o desativar

        if (!ativado) {
            campo.value = ''; // Limpa o valor do campo quando desmarcado
        }
    });
}
