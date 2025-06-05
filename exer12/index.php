<?php
$precoProduto = "";
$desconto = "";
$precoFinal = "";
$valorDesconto = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $precoProduto = $_POST["precoProduto"] ?? "";
    if (!is_numeric($precoProduto) || $precoProduto <= 0) {
        $erro = "Digite um valor válido para o produto.";
    } else {
        $desconto = rand(5, 25); // Percentual de desconto aleatório entre 5% e 25%
        $valorDesconto = $precoProduto * ($desconto / 100);
        $precoFinal = $precoProduto - $valorDesconto;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteio de Desconto</title>
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
        .preco {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .desconto {
            color: #007bff;
            font-weight: bold;
        }
        .final {
            color: #28a745;
            font-size: 1.3em;
            font-weight: bold;
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
        .erro {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sorteio de Desconto</h1>
        <form method="post">
            <input type="number" name="precoProduto" placeholder="Preço do produto" step="0.01" min="0" value="<?= htmlspecialchars($precoProduto) ?>" required>
            <button type="submit">Sortear desconto</button>
        </form>
        <?php if (!empty($erro)): ?>
            <div class="erro"><?= $erro ?></div>
        <?php endif; ?>
        <?php if ($precoFinal !== "" && $desconto !== ""): ?>
            <div class="preco">Preço original: <strong>R$ <?= number_format($precoProduto, 2, ',', '.') ?></strong></div>
            <div class="preco">Desconto sorteado: <span class="desconto"><?= $desconto ?>%</span></div>
            <div class="preco final">Preço com desconto: R$ <?= number_format($precoFinal, 2, ',', '.') ?></div>
        <?php endif; ?>
    </div>
</body>
</html>