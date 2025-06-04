<?php
$resultado = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nota1 = $_POST["nota1"] ?? "";
    $nota2 = $_POST["nota2"] ?? "";
    $nota3 = $_POST["nota3"] ?? "";
    if (!is_numeric($nota1) || !is_numeric($nota2) || !is_numeric($nota3)) {
        $resultado = "Por favor, digite três notas válidas.";
    } else {
        $media = ($nota1 + $nota2 + $nota3) / 3;
        $aprovado = $media >= 7 ? 
            "<span style='color:green;'>Aprovado</span>" : 
            "<span style='color:red;'>Reprovado</span>";
        $resultado = "Média: <strong>" . number_format($media, 2, ',', '.') . "</strong> - $aprovado";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Média de 3 Notas</title>
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
        <h1>Média de 3 Notas</h1>
        <form method="post">
            <input type="number" name="nota1" placeholder="Nota 1" step="0.01" required>
            <input type="number" name="nota2" placeholder="Nota 2" step="0.01" required>
            <input type="number" name="nota3" placeholder="Nota 3" step="0.01" required>
            <button type="submit">Calcular Média</button>
        </form>
        <?php if ($resultado): ?>
            <div class="resultado"><?= $resultado ?></div>
        <?php endif; ?>
    </div>
</body>
</html>