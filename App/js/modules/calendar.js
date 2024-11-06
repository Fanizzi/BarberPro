// Obter elementos HTML para atualizar o calendário
const currentMonthLabel = document.getElementById("current-month");
const prevWeekButton = document.getElementById("prev-week");
const nextWeekButton = document.getElementById("next-week");
const calendarContainer = document.getElementById("calendar");

const currentDate = new Date();
let currentWeek = getWeek(currentDate); // Obter semana atual

// Função para calcular a semana do ano
function getWeek(date) {
    const startDate = new Date(date.getFullYear(), 0, 1);
    const days = Math.floor((date - startDate) / (24 * 60 * 60 * 1000));
    return Math.ceil((days + startDate.getDay() + 1) / 7);
}

// Função para obter as datas de uma semana específica
function getWeekDates(week, year) {
    const startDate = new Date(year, 0, 1);
    const daysToAdd = (week - 1) * 7;
    const startOfWeek = new Date(startDate.setDate(startDate.getDate() + daysToAdd));
    const weekDates = [];
    
    for (let i = 0; i < 7; i++) {
        const date = new Date(startOfWeek);
        date.setDate(startOfWeek.getDate() + i);
        weekDates.push(date);
    }

    return weekDates;
}

// Função para renderizar o calendário e exibir os dias da semana atual
function renderCalendar(week, year) {
    const weekDates = getWeekDates(week, year);
    calendarContainer.innerHTML = "";
    
    // Atualizar o nome do mês e ano no cabeçalho
    const visibleMonth = weekDates[0].getMonth();
    const visibleYear = weekDates[0].getFullYear();
    currentMonthLabel.textContent = `${weekDates[0].toLocaleString("pt-BR", { month: "long" })} ${visibleYear}`;

    // Exibir os dias da semana e aplicar as regras de seleção de dias
    weekDates.forEach(date => {
        const dayDiv = document.createElement("div");
        dayDiv.classList.add("day");
        dayDiv.innerText = date.getDate();

        // Desabilitar dias fora do mês atual e do próximo
        if (date.getMonth() < currentDate.getMonth() || date.getMonth() > currentDate.getMonth() + 1) {
            dayDiv.classList.add("day-disabled");
        } else {
            // Permitir seleção e vincular uma função de clique
            dayDiv.addEventListener("click", () => {
                saveDateToBackend(date);
            });
        }
        
        calendarContainer.appendChild(dayDiv);
    });
}

// Função para enviar a data selecionada para o backend
function saveDateToBackend(date) {
    // Exemplo de como salvar a data em um formato que o backend PHP possa entender
    const formattedDate = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}-${String(date.getDate()).padStart(2, '0')}`;
    console.log("Data selecionada:", formattedDate);
    // Aqui você poderia fazer uma requisição fetch() para enviar a data ao backend
}

// Adicionar eventos aos botões de navegação
prevWeekButton.addEventListener("click", () => {
    if (currentWeek > getWeek(currentDate)) {  // Impede de retroceder antes da semana atual
        currentWeek--;
        renderCalendar(currentWeek, currentDate.getFullYear());
    }
});

nextWeekButton.addEventListener("click", () => {
    currentWeek++;
    renderCalendar(currentWeek, currentDate.getFullYear());
});

// Inicializar o calendário com a semana e ano atual
renderCalendar(currentWeek, currentDate.getFullYear());
