<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form method="POST">
        <h1>Cadastro</h1>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome">

        <br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email">

        <br><br>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone">

        <br><br>

        <button type="submit">Cadastrar</button>
    </form>
<?php

    $databaseUrl = getenv("DATABASE_URL");
    $url = parse_url($databaseUrl);

    $host = $url["host"];
    $port = $url["port"] ?? 5432;
    $dbname = ltrim($url["path"], "/");
    $user = $url["user"];
    $password = $url["pass"];

    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require",
        $user,
        $password
    );

    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe o e-mail enviado pelo formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    // Mostra as informações recebidas recebido
    echo "Dados recebidos:<br>";
    echo "Nome: " . $nome . "<br>";
    echo "E-mail: " . $email . "<br>";
    echo "Telefone: " . $telefone;
}    
?>
    
</body>
</html>

