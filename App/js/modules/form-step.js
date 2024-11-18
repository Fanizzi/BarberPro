document.addEventListener("DOMContentLoaded", function () {
    let currentStep = 1; // Define a etapa inicial

    // Função para exibir a etapa atual e esconder as demais
    function showStep(step) {
        document.querySelectorAll(".form-step").forEach((stepDiv) => {
            stepDiv.style.display = "none"; // Esconde todas as etapas
        });

        const stepElement = document.getElementById("step-" + step);
        if (stepElement) {
            stepElement.style.display = "block"; // Exibe a etapa atual
        } else {
            console.error(`Etapa 'step-${step}' não encontrada.`);
        }
    }

    // Valida os campos da etapa 1
    function validateStep1() {
        const nomeBarbearia = document.getElementById("nome_barbearia").value.trim();
        const nomeContato = document.getElementById("nome_contato").value.trim();
        const telefone = document.getElementById("telefone").value.trim();
        const email = document.getElementById("register-email").value.trim();
        const cnpj = document.getElementById("register-cnpj").value.trim();
        const senha = document.getElementById("register-senha").value.trim();
    
        return nomeBarbearia && nomeContato && telefone && email && cnpj && senha;
    }

    // Valida os campos da etapa 2
    function validateStep2() {
        const logradouro = document.getElementById("logradouro").value.trim();
        const numero = document.getElementById("numero").value.trim();
        const cidade = document.getElementById("cidade").value.trim();
        const estado = document.getElementById("estado").value.trim();
        const cep = document.getElementById("cep").value.trim();

        return logradouro && numero && cidade && estado && cep;
    }

    // Avança para a próxima etapa
    function nextStep() {
        if (currentStep === 1 && validateStep1()) {
            currentStep++;
            showStep(currentStep);
        } else {
            alert("Por favor, preencha todos os campos obrigatórios.");
        }
    }

    // Volta para a etapa anterior
    function previousStep() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    }

    // Exibe a etapa inicial ao carregar
    showStep(currentStep);

    // Botão para avançar da etapa 1 para a 2
    document.getElementById("nextBtn1").addEventListener("click", nextStep);

    // Botão para voltar da etapa 2 para a 1
    document.getElementById("prevBtn2").addEventListener("click", previousStep);
});
