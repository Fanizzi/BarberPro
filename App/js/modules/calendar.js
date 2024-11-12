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

// Função para obter todos os dias de um mês específico
function getMonthDates(month, year) {
    const firstDay = new Date(year, month, 1); // Primeiro dia do mês
    const lastDay = new Date(year, month + 1, 0); // Último dia do mês

    const dates = [];
    let currentDate = firstDay;

    while (currentDate <= lastDay) {
        dates.push(new Date(currentDate)); // Adiciona o dia à lista
        currentDate.setDate(currentDate.getDate() + 1); // Avança para o próximo dia
    }

    return dates;
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
    calendarContainer.innerHTML = ""; // Limpar o conteúdo do calendário

    // Atualizar o nome do mês e ano no cabeçalho
    currentMonthLabel.textContent = `${weekDates[0].toLocaleString("pt-BR", { month: "long" })} ${year}`;

    // Exibir os dias da semana
    weekDates.forEach(date => {
        const dayDiv = document.createElement("div");
        dayDiv.classList.add("day");
        dayDiv.innerText = date.getDate();

        // Verifica se o dia é o dia atual e aplica a classe 'today'
        const currentDateNoTime = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate());
        const dateNoTime = new Date(date.getFullYear(), date.getMonth(), date.getDate());

        // Aplica a classe 'today' no dia atual
        if (dateNoTime.getTime() === currentDateNoTime.getTime()) {
            dayDiv.classList.add("today");
        }

        // Verifica se o dia é anterior ao dia de hoje
        if (dateNoTime < currentDateNoTime) {
            dayDiv.classList.add("day-past");  // Classe para dias passados
            dayDiv.style.pointerEvents = 'none'; // Desabilitar o clique
        } 
        // Verifica se o dia é do mês atual ou do próximo mês
        // Todos os dias do mês atual ou do mês seguinte (inclusive) são clicáveis
        else if (date.getMonth() === currentDate.getMonth() || date.getMonth() === currentDate.getMonth() + 1) {
            dayDiv.addEventListener("click", () => {
                saveDateToBackend(date);
            });
        } 
        // Se for do mês após o próximo (ex: janeiro se estamos em novembro ou dezembro), desabilita o clique
        else {
            dayDiv.classList.add("day-disabled");
            dayDiv.style.pointerEvents = 'none'; // Desabilitar o clique
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
