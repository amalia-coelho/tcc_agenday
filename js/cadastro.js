const validar = document.getElementById('entrar');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');
const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

// Botão de validar
const botao = document.getElementById("botao");

function enableButton() {
    botao.disabled = false;
}

function disableButton() {
    botao.disabled = true;
}

document.getElementById("input").addEventListener("input", function (event) {
    // Busca conteúdo do input
    var conteudo = document.getElementById("input").value;

    // Valida conteúdo do input 
    if (conteudo !== null && conteudo !== '') {
        enableButton(); // Habilita o botão
    } else {
        disableButton(); // Desabilita o botão se o conteúdo do input ficar em branco
    }
});

// Função para configurar erros
function setError(index) {
    campos[index].style.outline = 'none';
    campos[index].style.border = '1px solid #e63636';
    spans[index].style.display = 'block';
    disableButton(); // Desabilita o botão quando houver erros
}

function removeError(index) {
    spans[index].style.display = 'none';
    campos[index].style.border = '';
    campos[index].style.outline = '1px solid #6c63ff';
    enableButton(); // Habilita o botão quando os erros são removidos
}

function nameValidate() {
    if (campos[0].value.length < 3) {
        setError(0);
    } else {
        removeError(0);
    }
}

function RmValidate() {
    if (campos[1].value.length < 5) {
        setError(1);
    } else {
        removeError(1);
    }
}


function mainPasswordValidate() {
    if (campos[3].value.length < 8) {
        setError(3);
    } else {
        removeError(3);
    }
}


function comparePassword() {
    if (campos[3].value == campos[4].value && campos[4].value.length >= 8) {
        removeError(4);
    } else {
        setError(4);
    }
}

// Intercepte o clique no botão
botao.addEventListener("click", function (event) {
    // Verifique se ainda existem erros
    for (let i = 0; i < campos.length; i++) {
        if (spans[i].style.display === 'block') {
            event.preventDefault(); // Impede o comportamento padrão do link (navegação)
            return;
        }
    }
});

// Vincule os eventos de validação aos campos apropriados
document.getElementById("nome").addEventListener("input", nameValidate);
document.getElementById("rm").addEventListener("input", RmValidate);
document.getElementById("email").addEventListener("input", emailValidate);
document.getElementById("senha").addEventListener("input", mainPasswordValidate);
document.getElementById("confirmarSenha").addEventListener("input", comparePassword);