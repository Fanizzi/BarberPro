<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/main.css">
    <link rel="stylesheet" href="/CSS/agendamentos.css">
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
                <?php if (isset($_SESSION['usuario_logado'])): ?>
                    <?php 
                        $usuario = unserialize($_SESSION['usuario_logado']); 
                        $nome = htmlspecialchars($usuario->nome);
                        $avatar = htmlspecialchars($usuario->avatar); // Substitua pelo caminho correto do avatar
                    ?>
                    <div class="navbar-user">
                        <img src="<?= $avatar ?>" alt="Avatar de <?= $nome ?>" class="user-icon">
                        <span class="user-name"><?= $nome ?></span>
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
        <h1>Agendamentos</h1>
        <h2>Meus Agendamentos</h2>

        <?php if (empty($model)): ?>
            <p>Você não tem agendamentos registrados.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Serviço</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($model as $agendamento): ?>
                        <tr>
                            <td><?php echo $agendamento->id; ?></td>
                            <td><?php echo $agendamento->data; ?></td>
                            <td><?php echo $agendamento->servico; ?></td>
                            <td><?php echo $agendamento->status; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
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