<?php
$frase = "";
$palavra = "";
$resultado = "";
$erro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frase = $_POST["frase"] ?? "";
    $palavra = $_POST["palavra"] ?? "";
    if (empty($frase) || empty($palavra)) {
        $erro = "Preencha a frase e a palavra a censurar.";
    } else {
        // Substitui todas as ocorrências da palavra (case-insensitive) por ***
        $resultado = str_ireplace($palavra, "***", $frase);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Censurador de Palavras</title>
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
            width: 220px;
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
        textarea {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 220px;
            height: 60px;
            margin-bottom: 10px;
            resize: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Censurador de Palavras</h1>
        <form method="post">
            <textarea name="frase" placeholder="Digite a frase" required><?= htmlspecialchars($frase) ?></textarea><br>
            <input type="text" name="palavra" placeholder="Palavra a censurar" value="<?= htmlspecialchars($palavra) ?>" required><br>
            <button type="submit">Censurar</button>
        </form>
        <?php if (!empty($erro)): ?>
            <div class="erro"><?= $erro ?></div>
        <?php endif; ?>
        <?php if ($resultado !== "" && empty($erro)): ?>
            <div class="resultado">
                <strong>Resultado:</strong><br>
                <?= htmlspecialchars($resultado) ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>