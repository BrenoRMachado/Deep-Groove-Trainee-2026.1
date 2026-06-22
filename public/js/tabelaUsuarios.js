// *Exibe erros de email duplicado (vindos do PHP) como validação nativa do browser

// *Ao criar usuário
document.querySelector('#modal-criar-usuarios').addEventListener('submit', async function(event) {
    event.preventDefault();

    const inputEmail = this.querySelector('input[name="email"]');
    inputEmail.setCustomValidity('');

    const formData = new FormData();
    formData.append('email', inputEmail.value);

    const resposta = await fetch('/tabelaUsuarios/verificarEmail', { method: 'POST', body: formData });
    const dados = await resposta.json();

    if (dados.jaExiste) {
        inputEmail.setCustomValidity('Este email já está em uso');
        inputEmail.reportValidity();
    } else {
        this.submit();
    }
});

// *Ao editar usuário
document.querySelectorAll('.modal-edicao-usuarios form').forEach(form => {
    form.addEventListener('submit', async function(event) {
        event.preventDefault();

        const inputEmail = this.querySelector('input[name="email"]');
        inputEmail.setCustomValidity('');

        const idUsuario = this.querySelector('input[name="id"]').value;

        const formData = new FormData();
        formData.append('email', inputEmail.value);
        formData.append('id', idUsuario);

        const resposta = await fetch('/tabelaUsuarios/verificarEmail', { method: 'POST', body: formData });
        const dados = await resposta.json();

        if (dados.jaExiste) {
            inputEmail.setCustomValidity('Este email já está em uso');
            inputEmail.reportValidity();
        } else {
            this.submit();
        }
    });
});

//* *Aciona o botão toggle ao clicar nele
function acionarBotaoToggle(idBotaoToggle, idTextoPermissaoAdmin, idIsAdminInput){
    const botaoToggle = document.querySelector(idBotaoToggle);
    const textoPermissaoAdmin = document.querySelector(idTextoPermissaoAdmin);
    const isAdminInput = document.querySelector(idIsAdminInput);
    botaoToggle.classList.toggle('pin-ativo');
    botaoToggle.classList.toggle('pin-inativo');
    if (botaoToggle.classList.contains('pin-ativo')){
        textoPermissaoAdmin.textContent = 'Acesso administrativo';
        isAdminInput.value = '1';
    }
    else {
        textoPermissaoAdmin.textContent = 'Acesso padrão';
        isAdminInput.value = '0';
    }
}

// *Seleciona o input de adicionar a foto de perfil do usuário:
const inputEscolherFotoDePerfilDoModalDeCriar = document.querySelector('#modal-criar-usuarios .foto-de-perfil-escolhida');

// *Aciona o input de escolher foto de perfil ao clicar no botão de adicionar foto de perfil do usuário:
function adicionarFotoDePerfil() {
        inputEscolherFotoDePerfilDoModalDeCriar.click();
        inputEscolherFotoDePerfilDoModalDeCriar.onchange = () => {
        const previewDaFotoDePerfilDoModalDeCriar = document.getElementById('preview-foto-de-perfil-ao-criar-usuario');
        if (previewDaFotoDePerfilDoModalDeCriar && inputEscolherFotoDePerfilDoModalDeCriar.files[0]) {
            previewDaFotoDePerfilDoModalDeCriar.src = URL.createObjectURL(inputEscolherFotoDePerfilDoModalDeCriar.files[0]);
        }
    };
};

//* Funções que alternam entre visualizar senha e não visualizar nos modais de criar e editar usuário ------------------------------------------------

const inputDeCriarSenha = document.querySelector(".criar-senha"); 
const iconeDeVisualizarSenhaNoModalDeCriar = document.querySelector(".icone-visualizar-senha-no-modal-de-criar");
let estadoDeVisualizacaoDaSenhaAoCriar = 'desativado';

let estadoDeVisualizacaoDaSenhaAoEditar = 'desativado';

function alternarVisualizacaoDaSenhaAoCriarUsuario() {
    if (estadoDeVisualizacaoDaSenhaAoCriar === 'desativado') {
        inputDeCriarSenha.type = '';
        iconeDeVisualizarSenhaNoModalDeCriar.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
        estadoDeVisualizacaoDaSenhaAoCriar = 'ativado';
    }
    else {
        inputDeCriarSenha.type = 'password';
        iconeDeVisualizarSenhaNoModalDeCriar.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
        estadoDeVisualizacaoDaSenhaAoCriar = 'desativado';
    }
    // *Dispara evento do input de criar senha
    inputDeCriarSenha.dispatchEvent(new Event('input'));
}

//* Mudança do tamanho da fonte do texto ao digitar a senha sem visualização e com visualização ao criar usuário
inputDeCriarSenha.addEventListener('input', function () {
    inputDeCriarSenha.classList.toggle('digitando-sem-ver-senha', iconeDeVisualizarSenhaNoModalDeCriar.classList.contains('bi-eye-slash-fill'));
    if (inputDeCriarSenha.value.length == 0){
        inputDeCriarSenha.classList.remove('digitando-sem-ver-senha');
    }
});

function alternarVisualizacaoDaSenhaAoEditarUsuario(inputId, iconeId) {
    const inputDeEditarSenha = document.querySelector(inputId); 
    const iconeDeVisualizarSenhaNoModalDeEditar = document.querySelector(iconeId);
    if (estadoDeVisualizacaoDaSenhaAoEditar === 'desativado') {
        inputDeEditarSenha.type = '';
        iconeDeVisualizarSenhaNoModalDeEditar.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
        estadoDeVisualizacaoDaSenhaAoEditar = 'ativado';
    }
    else {
        inputDeEditarSenha.type = 'password';
        iconeDeVisualizarSenhaNoModalDeEditar.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
        estadoDeVisualizacaoDaSenhaAoEditar = 'desativado';
    }
    // *Dispara evento do input de editar senha
    inputDeEditarSenha.dispatchEvent(new Event('input'));
    //* Mudança do tamanho da fonte do texto ao digitar a senha sem visualização e com visualização ao editar usuário
    inputDeEditarSenha.addEventListener('input', function () {
        inputDeEditarSenha.classList.toggle('digitando-sem-ver-senha', iconeDeVisualizarSenhaNoModalDeEditar.classList.contains('bi-eye-slash-fill'));
        if (inputDeEditarSenha.value.length == 0){
            inputDeEditarSenha.classList.remove('digitando-sem-ver-senha');
        }
    });
}

//* ------------------------------------------------------------------------------------------------------------------------------------------------

//* Mudança do tamanho da fonte do texto ao digitar a senha sem visualização e com visualização ao editar usuário
document.querySelectorAll('.editar-senha').forEach(input => {
    input.addEventListener('input', () => {
        const icone = input.closest('.container-editar-senha').querySelector('.icone-visualizar-senha-no-modal-de-editar');
        input.classList.toggle('digitando-sem-ver-senha', icone.classList.contains('bi-eye-slash-fill'));
    });
});

//* Todos os campos com 'required' no input exibirão a seguinte mensagem: 
const fundomodal = document.getElementById("fundo");
const inputsObrigatoriosDosModais = document.querySelectorAll('input');

inputsObrigatoriosDosModais.forEach(input => {
    input.addEventListener('invalid', function() {
            if (this.validity.valueMissing){
                this.setCustomValidity('Este campo é obrigatório');
            }
            else if (this.validity.typeMismatch) {
                this.setCustomValidity('Digite um endereço de email válido');
            }
    });
    input.addEventListener('input', function() {
        if (this.validity.typeMismatch) {
            this.setCustomValidity('Digite um endereço de email válido');
        }
        else {
            this.setCustomValidity('');
        }
    });
});
    
// *Aciona o input de escolher foto de perfil ao clicar no botão de adicionar foto de perfil do usuário e preview implementada:
function editarFotoDePerfil (idFotoDePerfilEscolhida, idPreviewFotoDePerfilAoEditarUsuario) {

        // *Input é acionado ao clicar no botão de alterar foto
        const inputEscolherFotoDePerfilDoModalDeEditar = document.querySelector(idFotoDePerfilEscolhida);
        inputEscolherFotoDePerfilDoModalDeEditar.click();

        // *Ao selecionar a foto, um endereço temporário local é criado para a imagem selecionada e exibe-a, sem precisar do servidor
        inputEscolherFotoDePerfilDoModalDeEditar.onchange = () => {
        const previewDaFotoDePerfilDoModalDeEditar = document.querySelector(idPreviewFotoDePerfilAoEditarUsuario);
        if (previewDaFotoDePerfilDoModalDeEditar && inputEscolherFotoDePerfilDoModalDeEditar.files[0]) {
            previewDaFotoDePerfilDoModalDeEditar.src = URL.createObjectURL(inputEscolherFotoDePerfilDoModalDeEditar.files[0]);
        }
    };
};

//! jsmodais

function abrirModal(idModal, idFundo) {
    const modal = document.querySelector(idModal);
    const fundo = document.querySelector(idFundo);
    
    if (modal && fundo) {
        fundo.style.display = 'flex'; 
        modal.style.display = 'flex';
    }
}

// Função para fechar o modal (esconde os elementos)
function fecharModal(idModal, idFundo) {
    const modal = document.querySelector(idModal);
    const fundo = document.querySelector(idFundo);

    if (modal && fundo) {
        fundo.style.display = 'none';
        modal.style.display = 'none';
    }
}
//! jsmodal

function fecharFundo (){
        const modais = document.querySelectorAll(".modalfundo");
        modais.forEach(modal => {
                 modal.style.display = "none";
        });
        fundomodal.style.display = "none";
}

function abrirModal(idModal) {
        //let - var q pode mudar dps
        //const - var constante nn muda dps
        const modal = document.querySelector(idModal);
        modal.style.display = "flex";

        //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
        fundomodal.style.display = "flex";
}

function fecharModal(idModal) {
        //let - var q pode mudar dps
        //const - var constante nn muda dps
        const modal = document.querySelector(idModal);
        modal.style.display = "none";

        //o all pega tds q tenham essa classe, se nn tivesse pegaria so no primeiro
        fundomodal.style.display = "none";

    resetarVisualizacaoDeSenhaAoFecharModal(idModal);
}

// *Função que retorna a visualização de senha para o estado desativado, sem ver, ao fechar o modal atual
function resetarVisualizacaoDeSenhaAoFecharModal(idModal){

    const iconeDeVisualizarSenhaNoModalDeCriar = document.querySelector(idModal + ' .icone-visualizar-senha-no-modal-de-criar');
    const inputDeCriarSenha = document.querySelector(idModal + ' .criar-senha');
    if (iconeDeVisualizarSenhaNoModalDeCriar && inputDeCriarSenha && iconeDeVisualizarSenhaNoModalDeCriar.classList.contains('bi-eye-fill')){
        iconeDeVisualizarSenhaNoModalDeCriar.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
        inputDeCriarSenha.type = 'password';
        estadoDeVisualizacaoDaSenhaAoCriar = 'desativado';
        inputDeCriarSenha.classList.add('digitando-sem-ver-senha');
    }
        
    const iconeDeVisualizarSenhaNoModalDeEditar = document.querySelector(idModal + ' .icone-visualizar-senha-no-modal-de-editar');
    const inputDeEditarSenha = document.querySelector(idModal + ' .editar-senha');
    if (iconeDeVisualizarSenhaNoModalDeEditar && inputDeEditarSenha && iconeDeVisualizarSenhaNoModalDeEditar.classList.contains('bi-eye-fill')){
        iconeDeVisualizarSenhaNoModalDeEditar.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
        inputDeEditarSenha.type = 'password';
        estadoDeVisualizacaoDaSenhaAoEditar = 'desativado';
        inputDeEditarSenha.classList.add('digitando-sem-ver-senha');
    }

}
