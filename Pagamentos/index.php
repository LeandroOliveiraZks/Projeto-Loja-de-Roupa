<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pagamento</title>
</head>
<body>
    <h2>Processar Pagamento</h2>
    <form action="process_payment.php" method="POST">
        <label for="amount">Valor:</label>
        <input type="number" name="amount" id="amount" required>

        <label for="currency">Moeda:</label>
        <input type="text" name="currency" id="currency" value="BRL" required>

        <label for="paymentMethod">Método de Pagamento (Token):</label>
        <input type="text" name="paymentMethod" id="paymentMethod" required>

        <button type="submit">Pagar</button>
    </form>
</body>
</html>
