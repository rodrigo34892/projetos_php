<?php
$frase = "";
$acronimo = "";
$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frase = $_POST["frase"] ?? "";
    if (empty(trim($frase))) {
        $erro = "Digite uma frase para gerar o acrônimo.";
    } else {
        $palavras = explode(" ", trim($frase));
        $acronimo = "";
        foreach ($palavras as $palavra) {
            if ($palavra !== "") {
                $acronimo .= substr($palavra, 0, 1);
            }
        }
        $acronimo = strtoupper($acronimo);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extrator de Acrônimo</title>
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
        input[type="text"] {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 260px;
            margin-bottom: 10px;
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
        }
        .erro {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Extrator de Acrônimo</h1>
        <form method="post">
            <input type="text" name="frase" placeholder="Digite a frase" value="<?= htmlspecialchars($frase) ?>" required>
            <button type="submit">Gerar Acrônimo</button>
        </form>
        <?php if (!empty($erro)): ?>
            <div class="erro"><?= $erro ?></div>
        <?php endif; ?>
        <?php if ($acronimo !== "" && empty($erro)): ?>
            <div class="resultado">
                <strong>Acrônimo:</strong> <?= htmlspecialchars($acronimo) ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>