document.addEventListener("DOMContentLoaded", function(){
    const formulario = document.getElementById("meuFormulario");
    
    formulario.addEventListener("submit", function(e){
    e.preventDefault();

    let valido = true;

    // para limpar os erros
    document.getElementById("erroNome").textContent = "";
    document.getElementById("erroSenha").textContent = "";
    document.getElementById("erroOTP").textContent = "";
    document.getElementById("erroCPF").textContent = "";
    document.getElementById("erroEmail").textContent = "";
    document.getElementById("erroTel").textContent = "";

    const nome = document.getElementById("nome").value.trim();
    const senha = document.getElementById("senha").value.trim();
    const otp = document.getElementById("otp").value.trim();
    const cpf = document.getElementById("cpf").value.trim();
    const email = document.getElementById("email").value.trim();
    const tel = document.getElementById("tel").value.trim();

    console.log(nome);
    console.log(senha);
    console.log(otp);
    console.log(cpf);
    console.log(email);
    console.log(tel);

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

    if (cpf.length > 11){
        document.getElementById("erroCPF").textContent = "O CPF informado é inválido";
        valido = false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)){
        document.getElementById("erroEmail").textContent = "E-mail inválido";
        valido = false;
    }


    if (tel.length > 11){
        document.getElementById("erroTel").textContent = "O telefone informado é inválido";
        valido = false;
    }



    if(valido) {
        alert("Formulário enviado com sucesso!");
        window.location.href= "paginaLogin.html";
    }


    });
});

