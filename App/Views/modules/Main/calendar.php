<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário Interativo</title>
    <link rel="stylesheet" href="/CSS/calendar.css">
</head>
<body>
  <div class="calendar-container">
    <div class="calendar-header">
      <!-- Exibe o nome do mês, que será atualizado dinamicamente -->
      <button id="prev-week">Semana Anterior</button>
      <h2 id="current-month">Janeiro, 2024</h2>
      <button id="next-week">Próxima Semana</button>
    </div>

    <!-- Área onde os dias da semana serão exibidos -->
    <div id="calendar"></div>
  </div>

  <script type="module" src="/js/modules/calendar.js"></script>
</body>

</html>