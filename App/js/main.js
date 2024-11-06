import { maskPhone } from './modules/mask.js'; // Importa a função do módulo mask.js
import { renderCalendar } from './modules/calendar.js';

// Espera até que o DOM esteja carregado para adicionar o evento
document.addEventListener("DOMContentLoaded", function() {
    const phoneInput = document.getElementById("telefone");
    phoneInput.addEventListener("input", function() {
        maskPhone(this);
    });
});

renderCalendar(currentWeek, currentDate.getFullYear());
