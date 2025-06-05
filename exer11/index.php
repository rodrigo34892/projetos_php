<?php
$resultado = "";
$senha = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $senha = $_POST["senha"] ?? "";
    if (strlen($senha) < 8) {
        $resultado = "<span style='color:red;'>A senha deve ter pelo menos 8 dígitos.</span>";
    } else {
        $resultado = "<span style='color:green;'>Senha válida!</span>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de Senha</title>
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
        input[type="password"] {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 180px;
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
        <h1>Validação de Senha</h1>
        <form method="post">
            <input type="password" name="senha" placeholder="Digite sua senha" required>
            <button type="submit">Validar</button>
        </form>
        <?php if ($resultado): ?>
            <div class="resultado"><?= $resultado ?></div>
        <?php endif; ?>
    </div>
</body>
</html>