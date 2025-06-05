document.addEventListener("DOMContentLoaded", function(){
    const formulario = document.getElementById("seuFormulario");
    
    formulario.addEventListener("submit", function(e){
    e.preventDefault();

    let valido = true;

    // para limpar os erros
    document.getElementById("erroNome").textContent = "";
    document.getElementById("erroCredencial").textContent = "";
    document.getElementById("erroSenha").textContent = "";
    document.getElementById("erroOTP").textContent = "";

    const nome = document.getElementById("nome").value.trim();
    const senha = document.getElementById("senha").value.trim();
    const otp = document.getElementById("otp").value.trim();
    const credencial = document.getElementById("credencial").value.trim();


    console.log(nome);
    console.log(senha);
    console.log(otp);
    console.log(credencial);
    

    if (nome.length < 3){
        document.getElementById("erroNome").textContent = "O nome deve ter pelo menos 3 caracteres";
        valido = false;
    }

    if (senha.length < 6){
        document.getElementById("erroSenha").textContent = "A senha é inválida";
        valido = false;
    }

    if (otp.length < 6){
        document.getElementById("erroOTP").textContent = "O OTP informado é inválido";
        valido = false;
    }

    if (credencial.length > 7){
        document.getElementById("erroCredencial").textContent = "A credencial informada é inválida";
        valido = false;
    }

    if(valido) {
        alert("Formulário enviado com sucesso!");
        formulario.reset();
        window.location.href= "paginaMenuPrincipal.html";
    }


    });
});