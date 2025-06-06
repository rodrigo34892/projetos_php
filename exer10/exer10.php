<?php
$resultado = "";
$ano_nascimento = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ano_nascimento = $_POST["ano_nascimento"] ?? "";
    $ano_atual = date("Y");
    if (!is_numeric($ano_nascimento) || $ano_nascimento > $ano_atual || $ano_nascimento < 1900) {
        $resultado = "Por favor, digite um ano de nascimento válido.";
    } else {
        $idade = $ano_atual - $ano_nascimento;
        $resultado = "Você tem <strong>$idade</strong> anos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Idade</title>
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
        <h1>Calcular Idade</h1>
        <form method="post">
            <input type="number" name="ano_nascimento" placeholder="Ano de nascimento" min="1900" max="<?= date('Y') ?>" value="<?= htmlspecialchars($ano_nascimento) ?>" required>
            <button type="submit">Calcular</button>
        </form>
        <?php if ($resultado): ?>
            <div class="resultado"><?= $resultado ?></div>
        <?php endif; ?>
    </div>
</body>
</html>