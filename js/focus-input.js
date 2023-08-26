const inputs = document.querySelectorAll('.inputs-container input');

inputs.forEach((input, index) => {
    input.addEventListener('input', () => {
        if (input.value.length > 1) {
            input.value = input.value.slice(0, 1); // Limita o tamanho do valor para 1 dígito
        }

        if (input.value.length === 0 && index > 0) {
            inputs[index - 1].focus(); // Move o foco para o campo anterior após apagar um dígito
        }

        if (input.value.length === 1 && index < inputs.length - 1) {
            inputs[index + 1].focus(); // Move o foco para o próximo campo após a entrada de um dígito
        }
    });
});