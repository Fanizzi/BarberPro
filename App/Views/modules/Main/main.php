<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/main.css">
    <link rel="stylesheet" href="/CSS/responsive.css">
    <link rel="stylesheet" href="/CSS/navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>BarberPro</title>
</head>
<body>
    <header>
        <nav>
        <a href="/main"><img src="/CSS/Sources/barberpro-logo-semfundo.png" id="logo" alt="BarberPro"></a>
            <div class="navbar-links">
                <ul>
                    <a href="/main"><li>início</li></a>
                    <a href="/agendamentos"><li>agendamentos</li></a>
                    <a href=""><li>procurar</li></a>
                </ul>
            </div>

            <div class="navbar-right">
                <<?php if (isset($_SESSION['usuario_logado'])): ?>
                <?php 
                    $usuario = unserialize($_SESSION['usuario_logado']); 
                    $nome_completo = htmlspecialchars($usuario->nome);
                    $avatar = htmlspecialchars($usuario->avatar);
                    
                    // Pega apenas o primeiro nome
                    $primeiro_nome = strtok($nome_completo, ' ');
                ?>
                <div class="navbar-user">
                    <img src="<?= $avatar ?>" alt="Avatar de <?= $primeiro_nome ?>" class="user-icon">
                    <span class="user-name"><?= $primeiro_nome ?></span>
                    <a href="/logout">Sair</a>
                </div>
                <?php else: ?>
                    <img src="CSS/Sources/user-icon.png" alt="Login" class="user-icon">
                    <a href="/login" class="login-button">Login</a>
                <?php endif; ?>
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
            <img src="/CSS/Sources/barbearia-img.jpg" alt="Brother's Barbearia" class="card-image">
            <div class="card-content">
                <h3>Brother's Barbearia</h3>
                <p>R. Floriano Peixoto 189, Bariri, SP, Brasil</p>
            </div>
        </div>

        <!--  Exibição de barbearias através do banco de dados
        <div class="cards-container">
            <?php foreach ($model as $barbearia): ?>
                <div class="card">
                    <a href="/barbearia?id=<?= $barbearia->id ?>">
                        <img src="<?= htmlspecialchars($barbearia->imagem ? $barbearia->imagem : '/uploads/barbearia/barber-banner.png') ?>" alt="Imagem da <?= htmlspecialchars($barbearia->nome) ?>" class="card-image">
                        <div class="card-content">
                            <h3><?= htmlspecialchars($barbearia->nome) ?></h3>
                            <p><?= htmlspecialchars($barbearia->endereco) ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        --!>

        <div class="card">
            <img src="/CSS/Sources/barbearia-2.jpg" alt="Imagem da Barbearia" class="card-image">
            <div class="card-content">
                <h3>Gabriel's Barbearia</h3>
                <p>Av. Claudionor Barbieri, 528, Bariri, SP, Brasil</p>
            </div>
        </div>

        <div class="card">
            <img src="/CSS/Sources/barbearia-3.jpg" alt="Imagem da Barbearia" class="card-image">
            <div class="card-content">
                <h3>Barbearia Jahu</h3>
                <p>R. Rui Barbosa, 961, Jaú, SP, Brasil</p>
            </div>
        </div>

        <div class="card">
            <img src="CSS/Sources/barbearia-4.jpg" alt="Imagem da Barbearia" class="card-image">
            <div class="card-content">
                <h3>O Soberano Barbearia</h3>
                <p>R. Quintino Bocaiúva 940, Jaú, SP, Brasil</p>
            </div>
        </div>

        <div class="card">
            <img src="CSS/Sources/barbearia-5.jpg" alt="Imagem da Barbearia" class="card-image">
            <div class="card-content">
                <h3>Barbearia Bauru</h3>
                <p>R. Alfredo Fontão, 4-17 - Jardim Paulista , Bauru, SP, Brasil</p>
            </div>
        </div>

        <div class="card">
            <img src="CSS/Sources/barbearia-6.png" alt="Imagem da Barbearia" class="card-image">
            <div class="card-content">
                <h3>Barbearia XV</h3>
                <p>R. Riachuelo, 180 - Centro, Jaú - SP, Brasil</p>
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