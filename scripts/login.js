document.addEventListener("DOMContentLoaded", function(){
    const formulario = document.getElementById("meuFormulario");
    
    formulario.addEventListener("submit", function(e){
    e.preventDefault();

    let valido = true;

    // para limpar os erros
    document.getElementById("erroNome").textContent = "";
    document.getElementById("erroCredencial").textContent = "";
    document.getElementById("erroSenha").textContent = "";
    document.getElementById("erroOTP").textContent = "";

    const nome = document .getElementById("nome").value.trim();
    const credencial = document .getElementById("credencial").value.trim();
    const senha = document .getElementById("senha").value.trim();
    const otp = document .getElementById("otp").value.trim();

    console.log(nome);
    console.log(credencial);
    console.log(senha);
    console.log(otp);

    if (nome.length < 3){
        document.getElementById("erroNome").textContent = "O nome deve ter pelo menos 3 caracteres";
        valido = false;
    }

    if (credencial.length < 3){
        document.getElementById("erroCredencial").textContent = "A credencial é inválida";
        valido = false;
    }

    if (senha.length < 6){
        document.getElementById("erroSenha").textContent = "A senha deve ter pelo menos 6 caracteres";
        valido = false;
    }

    if (otp.length < 6){
        document.getElementById("erroOTP").textContent = "O OTP informado é inválido";
        valido = false;
    }

    if(valido) {
        alert("Formulário enviado com sucesso!");
        formulario.reset();
        window.location.href= "paginaMenuPrincipal.html";
    }


    });
});

function redirecionar() {
    window.location.href = "paginaGastos2.html";
}
function redirecionar2() {
    window.location.href = "paginaMenuPrincipal.html";
}
function redirecionar3() {
    window.location.href = "paginaSelecioneLinhas.html";
}
function redirecionar4() {
    window.location.href = "paginaTrensAtivados1.html";
}
function redirecionar5() {
    window.location.href = "paginaControledeInspeção.html";
}
function redirecionar6() {
    window.location.href = "paginaRelatorioeAnalises.html";
}
function redirecionar7() {
    window.location.href = "paginaOuvidoriaGeral.html";
}
function redirecionar8() {
    window.location.href = "paginaAlertaseNotificacoes1.html";
}