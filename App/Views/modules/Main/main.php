<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/main.css">
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="/CSS/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>BarberPro</title>
</head>
<body>
    <header>
        <nav>
        <img href="main.php" src="/CSS/Sources/barberpro-logo-semfundo.png" id="logo" alt="BarberPro">
            <div class="navbar-links">
                <ul>
                    <a href="/main"><li>início</li></a>
                    <a href="/Views/modules/Main/calendar.php"><li>agendamentos</li></a>
                    <a href=""><li>procurar</li></a>
                </ul>
            </div>

            <div class="navbar-right">
                <img src="CSS/Sources/user-icon.png" alt="Login" class="user-icon">
                <a href="/register"><button id="login-button">Login</button></a>
            </div>             
        </nav>
    </header>

    <main>
        <section class="home-container">
            <h2>Encontre o seu Barbeiro!</h2>
            <div class="search-wrapper">
                <div class="search-container">
                    <input type="text" placeholder="Buscar..." id="search-input">
                    <button id="search-button">
                        <img src="CSS/Sources/search.png" alt="Pesquisar" class="search-icon">
                    </button>
                </div>
            </div>
        </section>

        <section class="barbers-container">
        <div class="cards-container">
        <div class="card">
            <img src="CSS/Sources/barbearia-img.jpg" alt="Brother's Barbearia" class="card-image">
            <div class="card-content">
                <h3>Brother's Barbearia</h3>
                <p>Floriano Peixoto 189, Bariri, SP, Brazil</p>
            </div>
        </div>

        <div class="card">
            <img src="CSS/Sources/card2-image.jpg" alt="Imagem da Barbearia" class="card-image">
            <div class="card-content">
                <h3>Título do Card 2</h3>
                <p>Endereço do Card 2</p>
            </div>
        </div>

        <div class="card">
            <img src="CSS/Sources/card3-image.jpg" alt="Imagem da Barbearia" class="card-image">
            <div class="card-content">
                <h3>Título do Card 3</h3>
                <p>Endereço do Card 3</p>
            </div>
        </div>

        <div class="card">
            <img src="CSS/Sources/card4-image.jpg" alt="Imagem da Barbearia" class="card-image">
            <div class="card-content">
                <h3>Título do Card 4</h3>
                <p>Endereço do Card 4</p>
            </div>
        </div>

        <div class="card">
            <img src="CSS/Sources/card5-image.jpg" alt="Imagem da Barbearia" class="card-image">
            <div class="card-content">
                <h3>Título do Card 5</h3>
                <p>Endereço do Card 5</p>
            </div>
        </div>

        <div class="card">
            <img src="CSS/Sources/card6-image.jpg" alt="Imagem da Barbearia" class="card-image">
            <div class="card-content">
                <h3>Título do Card 6</h3>
                <p>Endereço do Card 6</p>
            </div>
        </div>
        </div>
        </section>
    </main>

    <footer>
        <section class="footer-container">
            <p>© 2024 BarberPro</p>
        </section>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>