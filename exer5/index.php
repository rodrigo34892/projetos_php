<?php
$resultado = "";
$peso = "";
$altura = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = $_POST["peso"] ?? "";
    $altura = $_POST["altura"] ?? "";
    if (!is_numeric($peso) || !is_numeric($altura) || $altura <= 0) {
        $resultado = "Por favor, digite valores válidos para peso e altura.";
    } else {
        $imc = $peso / ($altura * $altura);
        if ($imc < 18.5) {
            $classificacao = "Abaixo do peso";
            $cor = "orange";
        } elseif ($imc < 25) {
            $classificacao = "Peso normal";
            $cor = "green";
        } elseif ($imc < 30) {
            $classificacao = "Sobrepeso";
            $cor = "goldenrod";
        } else {
            $classificacao = "Obesidade";
            $cor = "red";
        }
        $resultado = "IMC: <strong>" . number_format($imc, 2, ',', '.') . "</strong> - <span style='color:$cor;'>$classificacao</span>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
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
        <h1>Calculadora de IMC</h1>
        <form method="post">
            <input type="number" name="peso" placeholder="Peso (kg)" step="0.01" value="<?= htmlspecialchars($peso) ?>" required>
            <input type="number" name="altura" placeholder="Altura (m)" step="0.01" value="<?= htmlspecialchars($altura) ?>" required>
            <button type="submit">Calcular</button>
        </form>
        <?php if ($resultado): ?>
            <div class="resultado"><?= $resultado ?></div>
        <?php endif; ?>
    </div>
</body>
</html>