// Função que será executada quando o usuário selecionar um arquivo
function readImage() {
    // Verifica se há arquivos selecionados e se o primeiro arquivo existe
    if (this.files && this.files[0]) {
        // Cria um objeto FileReader para ler o conteúdo do arquivo
        var file = new FileReader();

        // Define a função a ser executada quando a leitura do arquivo for concluída
        file.onload = function(e) {
            // Define o atributo 'src' do elemento <img> com o ID 'preview'
            // para o conteúdo da imagem carregada, exibindo-a no navegador
            document.getElementById("preview").src = e.target.result;
        };

        // Inicia a leitura do arquivo como uma URL base64
        file.readAsDataURL(this.files[0]);
    }
}

// Adiciona o evento 'change' ao elemento <input> com o ID 'foto'
// Quando o usuário seleciona um arquivo, a função readImage será chamada
document.getElementById("foto").addEventListener("change", readImage, false);