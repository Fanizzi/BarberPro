export function maskPhone(input) {
    let value = input.value.replace(/\D/g, ""); // Remove qualquer caractere não numérico
    value = value.replace(/^(\d{2})(\d)/, "($1) $2"); // Adiciona o parêntese após os primeiros 2 dígitos
    value = value.replace(/(\d{5})(\d)/, "$1-$2"); // Adiciona o hífen após os 5 dígitos seguintes
    input.value = value; // Atualiza o valor do campo de entrada
}

