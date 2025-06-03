<?php

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["numero"]) && !empty(trim($_POST["numero"]))) {
        $numero = intval($_POST["numero"]);
        $dobro = $numero * 2;
        $mensagem = "O dobro de $numero é $dobro.";
    } else {
        $mensagem = "Por favor, preencha o campo número.";
    }
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Exemplo com PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16pt;
            margin: 1em;
        }

        .resultado {
            margin-top: 1em;
            padding: 1em;
            background-color:rgb(76, 20, 153);
            border-radius: 5px;
        }

        h1 {
            font-size: 2em;
        }
    </style>
</head>

<body>
    <h1>CALCULADORA DO DOBRO</h1>
    <form method="post">
        <label for="numero">Digite um número:</label>
        <input type="number" name="numero" id="numero" value="<?= isset($_POST["numero"]) ? htmlspecialchars($_POST["numero"]) : '' ?>">
        <button type="submit">Calcular</button>
    </form>
    <div class="resultado">
        <h1>Resultado</h1>
        <p><?= $mensagem ?></p>
    </div>

</body>

</html>