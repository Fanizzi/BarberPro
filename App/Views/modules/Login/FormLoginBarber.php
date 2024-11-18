<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberPro</title>
    <link rel="stylesheet" href="/CSS/login.css">
    <link rel="stylesheet" href="/CSS/loginbarber.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="login-register-container">
        <!-- Lado esquerdo - Imagem e Botão Registrar -->
        <div class="left-side">
            <img src="/CSS/Sources/loginbarber-image.jpg" alt="Imagem de fundo" class="background-image">
            <div class="message-container">
                <h2>Não possui uma conta?</h2>
                <p>Registre-se e aproveite os nossos serviços como Barbeiro!</p>
                <button id="register-overlay-btn">Registrar</button>
            </div>
        </div>

        <!-- Lado direito - Formulários de Login e Registro -->
        <div class="right-side">
            <!-- Formulário de Login -->
            <form action="/login_barbershop/auth" method="POST" id="login-form" class="form">
                <h2>Login</h2>
                <input type="email" placeholder="Email" id="login-email" name="email">
                <input type="password" placeholder="Senha" id="login-senha" name="senha">
                <input type="text" placeholder="CNPJ" id="login-cnpj" name="cnpj">

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

            <!-- Formulário de Registro -->
            <form id="register-form" action="/register_barbershop/save" method="POST" class="form hidden">
                <div class="form-step" id="step-1">
                    <h2>Informações da Barbearia</h2>
                    <input type="text" placeholder="Nome da Barbearia" id="nome_barbearia" name="nome_barbearia" required>
                    <input type="text" placeholder="Nome do Proprietário" id="nome_contato" name="nome_contato" required>
                    <input type="text" placeholder="Telefone" id="register-telefone" name="telefone" maxlength="15" required>
                    <input type="text" placeholder="CNPJ" id="register-cnpj" name="cnpj" required>
                    <input type="email" placeholder="Email" id="register-email" name="email" required>
                    <input type="password" placeholder="Senha" id="register-senha" name="senha" required>

                    <button type="button" id="nextBtn1" class="submit-button">Próximo</button>
                </div>
                <div class="form-step" id="step-2">
                    <h2>Endereço da Barbearia</h2>
                    <input type="text" placeholder="Logradouro" id="logradouro" name="logradouro" required>
                    <input type="text" placeholder="Número" id="numero" name="numero" required>
                    <input type="text" placeholder="Cidade" id="cidade" name="cidade" required>
                    <input type="text" placeholder="Estado" id="estado" name="estado" required>
                    <input type="text" placeholder="CEP" id="cep" name="cep" required>

                    <div class="button-container">
                        <button type="button" id="prevBtn2" class="nxtPrvBtn">Voltar</button>
                        <button type="submit" class="submit-button">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<script src="/js/modules/form-step.js" type="module"></script>
<script src="/js/modules/switch-form.js" type="module"></script>
<script src="/js/modules/mask.js" type="module"></script>
</body>
</html>
