<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <title>Cadastro</title>
</head>
<body>
    <form action="/register/save" method="post">
        <label>Nome</label>
        <input name="nome" type="text" />
        
        <label>E-mail:</label>
        <input name="email" type="text" />

        <label>Senha:</label>
        <input name="senha" type="password" />

        <label>Telefone:</label>
        <input name="telefone" type="text">

    <button type="submit">Registrar</button>
</form>
</body>
</html>