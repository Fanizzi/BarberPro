// Função principal para alternar os formulários e lados
function toggleForms() {
    const toggleButton = document.getElementById("register-overlay-btn");
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const container = document.querySelector(".login-register-container");
    const messageContainer = document.querySelector(".message-container");

    toggleButton.addEventListener("click", () => {
        // Verifica se o formulário de login está visível
        const isLoginVisible = !loginForm.classList.contains("hidden");

        if (isLoginVisible) {
            // Oculta o formulário de login, mostra o de registro e troca os lados
            loginForm.classList.add("hidden");
            registerForm.classList.remove("hidden");
            container.classList.add("switch-sides");

            // Atualiza o botão e as mensagens
            toggleButton.textContent = "Voltar para Login";
            messageContainer.querySelector("h2").textContent = "Já possui um registro?";
            messageContainer.querySelector("p").textContent = "Faça login para continuar.";
        } else {
            // Oculta o formulário de registro, mostra o de login e troca os lados
            registerForm.classList.add("hidden");
            loginForm.classList.remove("hidden");
            container.classList.remove("switch-sides");

            // Atualiza o botão e as mensagens
            toggleButton.textContent = "Registrar";
            messageContainer.querySelector("h2").textContent = "Não tem uma conta?";
            messageContainer.querySelector("p").textContent = "Registre-se e aproveite os nossos serviços!";
        }
    });
}

// Inicialização da função ao carregar a página
document.addEventListener("DOMContentLoaded", toggleForms);
