<?php
$catetoA = "";
$catetoB = "";
$hipotenusa = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $catetoA = $_POST["catetoA"] ?? "";
    $catetoB = $_POST["catetoB"] ?? "";
    if (!is_numeric($catetoA) || !is_numeric($catetoB) || $catetoA <= 0 || $catetoB <= 0) {
        $erro = "Digite valores válidos e positivos para os catetos.";
    } else {
        $hipotenusa = sqrt(pow($catetoA, 2) + pow($catetoB, 2));
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Hipotenusa</title>
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
        .erro {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora de Hipotenusa</h1>
        <form method="post">
            <input type="number" name="catetoA" placeholder="Cateto A" step="0.01" min="0" value="<?= htmlspecialchars($catetoA) ?>" required>
            <input type="number" name="catetoB" placeholder="Cateto B" step="0.01" min="0" value="<?= htmlspecialchars($catetoB) ?>" required>
            <button type="submit">Calcular</button>
        </form>
        <?php if (!empty($erro)): ?>
            <div class="erro"><?= $erro ?></div>
        <?php endif; ?>
        <?php if ($hipotenusa !== "" && empty($erro)): ?>
            <div class="resultado">
                Hipotenusa: <strong><?= number_format($hipotenusa, 2, ',', '.') ?></strong>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>