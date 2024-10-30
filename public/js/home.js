const validaForm = () => {
    document.addEventListener("DOMContentLoaded", () => {
        const form = document.getElementById("formCadastro");
        const formBotao = document.getElementById("formBotao");

        form.addEventListener("input", () => {
            let isValid = true;
            let message = "";

            const nome = document.getElementById("nome").value.trim();
            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();
            const email = document.getElementById("email").value.trim();

            if (!nome) {
                isValid = false;
                message += "Nome é obrigatório.\n";
            }
            if (!username) {
                isValid = false;
                message += "Nome de usuário é obrigatório.\n";
            }
            if (!password) {
                isValid = false;
                message += "Senha é obrigatória.\n";
            }
            if (!email || !validateEmail(email)) {
                isValid = false;
                message += "Email inválido.\n";
            }

            formBotao.disabled = !isValid;

            if (message) {
                alert(message);
            }
        });
    });
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    return re.test(String(email).toLowerCase());
}

validaForm();
