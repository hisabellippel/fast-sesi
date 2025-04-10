function validarLogin() {
const nome = document.getElementById ('nome').ariaValueMax.trim();
if (!nome){
    alert ('Por favor, preencher o nome');
    return;
 }else{
    console.log (nome);
 }
 

 const credencial = document.getElementById('credencial').ariaValueMax.trim();
 if (!credencial){
   alert ('Por favor, insira sua credencial');
   return;
}else{
   console.log (credencial);
}

const senha = parseInt(document.getElementById('senha').value.trim);
if (!senha || !senha.lenght == 10 || isNaN(senha)){
   alert('Por favor, insira uma senha válida.');
   return;
}else{
   console.log(senha)
}

const OTP = parseInt(document.getElementById('OTP').value, 10);
if (!OTP || !OTP.lenght == 5 || isNaN(OTP)) {
   alert('Por favor, insira um código válido.');
   return;
}else{
   console.log(OTP)
}
}
