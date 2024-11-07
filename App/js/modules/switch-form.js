export function toggleForms() {
    const toggleButton = document.getElementById("register-overlay-btn");
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const messageContainer = document.querySelector(".message-container");
    const container = document.querySelector(".login-register-container");

    // Função para alternar entre os formulários, atualizar o botão, mensagem e inverter os lados
    function toggleFormsAndButton() {
        if (loginForm.classList.contains("hidden")) {
            // Mostrar o formulário de login e atualizar a mensagem e o botão
            loginForm.classList.remove("hidden");
            registerForm.classList.add("hidden");
            toggleButton.textContent = "Registrar";
            messageContainer.querySelector("h2").textContent = "Não tem uma conta?";
            messageContainer.querySelector("p").textContent = "Registre-se e aproveite os nossos serviços!";
            container.classList.remove("switch-sides"); // Reverte a posição dos lados
        } else {
            // Mostrar o formulário de registro e atualizar a mensagem e o botão
            loginForm.classList.add("hidden");
            registerForm.classList.remove("hidden");
            toggleButton.textContent = "Voltar para Login";
            messageContainer.querySelector("h2").textContent = "Já possui um registro?";
            messageContainer.querySelector("p").textContent = "Faça login para continuar.";
            container.classList.add("switch-sides"); // Troca os lados
        }
    }

    // Adiciona o evento de clique ao botão para alternar entre os formulários
    toggleButton.addEventListener("click", toggleFormsAndButton);
}

// Chama a função ao carregar a página
toggleForms();
