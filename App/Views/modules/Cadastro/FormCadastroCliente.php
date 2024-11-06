<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/main.css">
    <link rel="stylesheet" href="/CSS/style.css">
    <link rel="stylesheet" href="/CSS/responsive.css">
    <link rel="stylesheet" href="/CSS/form.css">
    <title>Cadastro</title>
</head>
<body>
    <header>
        <nav>
            <img href="main.php" src="/CSS/Sources/barberpro-logo-semfundo.png" id="logo" alt="BarberPro">
            <div class="navbar-links">
                <ul>
                    <a href="/main"><li>início</li></a>
                    <a href=""><li>agendamentos</li></a>
                    <a href=""><li>procurar</li></a>
                </ul>
            </div>

            <div class="navbar-right">
                <img src="/CSS/Sources/user-icon.png" alt="Login" class="user-icon">
                <a href="/register/"><button id="login-button">Login</button></a>
            </div>             
        </nav>
    </header>

    <main>
        <section class="home-container">
            <form action="/register/save" method="post" class="registration-form">
                <label for="nome">Nome:</label>
                <input id="nome" name="nome" type="text" placeholder="Digite seu nome" />

                <label for="email">E-mail:</label>
                <input id="email" name="email" type="text" placeholder="Digite seu e-mail" />

                <label for="senha">Senha:</label>
                <input id="senha" name="senha" type="password" placeholder="Digite sua senha" />

                <label for="telefone">Telefone:</label>
                <input id="telefone" name="telefone" type="text" placeholder="Digite seu telefone" maxlength="15">

                <button type="submit" href="/login">Registrar</button>
            </form>
        </section>
    </main>

    <footer>
        <section class="footer-container">
            <p>© 2024 BarberPro</p>
        </section>
    </footer>

    <script src="/js/main.js" type="module"></script>
</body>
</html>