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
    <title>Calculadora do Dobro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }
        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }
        input[type="number"] {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 120px;
            margin-right: 10px;
        }
        button {
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            background: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .resultado {
            margin-top: 20px;
            font-size: 1.2em;
            background-color: rgb(76, 20, 153);
            color: #fff;
            border-radius: 8px;
            padding: 15px;
        }
        h1 {
            font-size: 2em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CALCULADORA DO DOBRO</h1>
        <form method="post">
            <label for="numero">Digite um número:</label>
            <input type="number" name="numero" id="numero" value="<?= isset($_POST["numero"]) ? htmlspecialchars($_POST["numero"]) : '' ?>" required>
            <button type="submit">Calcular</button>
        </form>
        <div class="resultado">
            <strong>Resultado:</strong>
            <p><?= $mensagem ?></p>
        </div>
    </div>
</body>
</html>