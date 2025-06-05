<?php
$nomeCompleto = "";
$usuario = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeCompleto = $_POST["nome"] ?? "";
    // Remove espaços no início e fim
    $usuario = trim($nomeCompleto);
    // Converte para minúsculas
    $usuario = strtolower($usuario);
    // Substitui espaços internos por ponto
    $usuario = str_replace(" ", ".", $usuario);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Nome de Usuário</title>
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
        <h1>Gerador de Nome de Usuário</h1>
        <form method="post">
            <input type="text" name="nome" placeholder="Digite o nome completo" value="<?= htmlspecialchars($nomeCompleto) ?>" required>
            <button type="submit">Gerar</button>
        </form>
        <?php if ($usuario): ?>
            <div class="resultado">
                Nome de usuário: <strong><?= $usuario ?></strong>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>