   document.getElementById("im2").addEventListener("click", function() {
            const alerta = document.getElementById("alertaNotificacao");
            if(alerta) { 
                alerta.classList.add("show");
                setTimeout(() => {
                    alerta.classList.remove("show");
                }, 2000);
            }
        });