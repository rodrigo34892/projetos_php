<?php
$resultado = "";
$numero = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"] ?? "";
    if (!is_numeric($numero) || $numero == 0) {
        $resultado = "Por favor, digite um número válido e diferente de zero.";
    } else {
        $resultado = "Os 10 primeiros múltiplos de <strong>$numero</strong> são:<br>";
        for ($i = 1; $i <= 10; $i++) {
            $resultado .= ($numero * $i) . ($i < 10 ? " | " : "");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>10 Primeiros Múltiplos</title>
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
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>10 Primeiros Múltiplos</h1>
        <form method="post">
            <input type="number" name="numero" placeholder="Digite um número" step="any" value="<?= htmlspecialchars($numero) ?>" required>
            <button type="submit">Exibir</button>
        </form>
        <?php if ($resultado): ?>
            <div class="resultado"><?= $resultado ?></div>
        <?php endif; ?>
    </div>
</body>
</html>