<?php
$resultado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"] ?? "";
    $num2 = $_POST["num2"] ?? "";
    if (!is_numeric($num1) || !is_numeric($num2)) {
        $resultado = "Por favor, digite dois números válidos.";
    } else {
        $soma = $num1 + $num2;
        $resultado = "A soma de <strong>$num1</strong> + <strong>$num2</strong> é <span style='color:green;'>$soma</span>.";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Somar Dois Números</title>
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
        <h1>Somar Dois Números</h1>
        <form method="post">
            <input type="number" name="num1" placeholder="Primeiro número" required>
            <input type="number" name="num2" placeholder="Segundo número" required>
            <button type="submit">Somar</button>
        </form>
        <?php if ($resultado): ?>
            <div class="resultado"><?= $resultado ?></div>
        <?php endif; ?>
    </div>
</body>
</html>