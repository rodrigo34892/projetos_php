<?php
$nota = "";
$notaRound = "";
$notaCeil = "";
$notaFloor = "";
$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nota = $_POST["nota"] ?? "";
    if (!is_numeric($nota)) {
        $erro = "Digite uma nota válida.";
    } else {
        $notaRound = round($nota);
        $notaCeil = ceil($nota);
        $notaFloor = floor($nota);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arredondador de Notas</title>
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
        <h1>Arredondador de Notas</h1>
        <form method="post">
            <input type="number" name="nota" placeholder="Digite a nota" step="0.01" value="<?= htmlspecialchars($nota) ?>" required>
            <button type="submit">Arredondar</button>
        </form>
        <?php if (!empty($erro)): ?>
            <div class="erro"><?= $erro ?></div>
        <?php endif; ?>
        <?php if ($notaRound !== "" && empty($erro)): ?>
            <div class="resultado">
                Nota original: <strong><?= $nota ?></strong><br>
                Arredondada (round): <strong><?= $notaRound ?></strong><br>
                Arredondada para cima (ceil): <strong><?= $notaCeil ?></strong><br>
                Arredondada para baixo (floor): <strong><?= $notaFloor ?></strong>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>