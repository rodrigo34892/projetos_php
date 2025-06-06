<<<<<<< HEAD
<?php
$resultado = "";
$valor = "";
$tipo = "c2f";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor = $_POST["valor"] ?? "";
    $tipo = $_POST["tipo"] ?? "c2f";
    if (!is_numeric($valor)) {
        $resultado = "Por favor, digite um valor numérico válido.";
    } else {
        if ($tipo == "c2f") {
            $fahrenheit = $valor * 9/5 + 32;
            $resultado = "<strong>$valor</strong>°C = <span style='color:blue;'>" . number_format($fahrenheit, 2, ',', '.') . "°F</span>";
        } else {
            $celsius = ($valor - 32) * 5/9;
            $resultado = "<strong>$valor</strong>°F = <span style='color:red;'>" . number_format($celsius, 2, ',', '.') . "°C</span>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Temperatura</title>
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
        input[type="number"], select {
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
        <h1>Conversor de Temperatura</h1>
        <form method="post">
            <input type="number" name="valor" placeholder="Temperatura" step="any" value="<?= htmlspecialchars($valor) ?>" required>
            <select name="tipo">
                <option value="c2f" <?= $tipo == "c2f" ? "selected" : "" ?>>Celsius → Fahrenheit</option>
                <option value="f2c" <?= $tipo == "f2c" ? "selected" : "" ?>>Fahrenheit → Celsius</option>
            </select>
            <button type="submit">Converter</button>
        </form>
        <?php if ($resultado): ?>
            <div class="resultado"><?= $resultado ?></div>
        <?php endif; ?>
    </div>
</body>
