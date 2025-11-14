const linhas = document.querySelectorAll('.linhas');
linhas.forEach(linha => {
linha.addEventListener('click', () => {
linha.classList.toggle('ativo');
linha.nextElementSibling?.classList.toggle('mostrar');
});
});