<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>BarberPro</title>
</head>
<body>
    <div class="login-register-container">
        <!-- Lado esquerdo - Imagem e Botão Registrar -->
        <div class="left-side">
            <img src="/CSS/Sources/login-image.jpg" alt="Imagem de fundo" class="background-image">
            <div class="message-container">
                <h2>Não possui uma conta?</h2>
                <p>Registre-se e aproveite os nossos serviços!</p>
                <button id="register-overlay-btn">Registrar</button>
            </div>
        </div>

        <!-- Lado direito - Formulários de Login e Registro -->
        <div class="right-side">
            <!-- Formulário de Login -->
            <form action="/login/auth" method="POST" id="login-form" class="form">
                <h2>Login</h2>
                <input type="email" placeholder="Email" id="email" name="email">
                <input type="password" placeholder="Senha" id="senha" name="senha">

                <!-- Opção de Lembrar de Mim e Esqueci minha senha -->
                <div class="login-options">
                    <label class="remember-me">Lembrar de mim
                        <input type="checkbox" id="remember-me">
                    </label>
                    <a href="#" class="forgot-password">Esqueci minha senha</a>
                </div>
    
                <!-- Botões de login social -->
                <div class="social-login">
                    <button type="button" class="social-button google-button"><i class="fab fa-google"></i></button>
                    <button type="button" class="social-button facebook-button"><i class="fab fa-facebook-f"></i></button>
                </div>
                <button type="submit" class="submit-button">Entrar</button>
            </form>

            <!-- Formulário de Registro (inicialmente escondido) -->
            <form action="/register/save" method="POST" id="register-form" class="form hidden">
                <h2>Registrar</h2>
                <input type="text" placeholder="Nome" id="nome" name="nome">
                <input type="email" placeholder="Email" id="email" name="email">
                <input type="password" placeholder="Senha" id="senha" name="senha">
                <input type="text" placeholder="Telefone" id="telefone" name="telefone">
                
                <!-- Botões de login social -->
                <div class="social-login">
                    <button type="button" class="social-button google-button"><i class="fab fa-google"></i></button>
                    <button type="button" class="social-button facebook-button"><i class="fab fa-facebook-f"></i></button>
                </div>

                <button type="submit" class="submit-button">Registrar</button>
            </form>
        </div>
    </div>

    <script src="/js/modules/switch-form.js" type="module"></script>
</body>
</html>
