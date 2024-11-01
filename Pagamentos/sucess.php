<?php
require_once 'PaymentGateway.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = $_POST['amount'];
    $currency = $_POST['currency'];
    $paymentMethod = $_POST['paymentMethod'];

    $apiKey = "SUA_CHAVE_API_DO_GATEWAY";
    $gateway = new PaymentGateway($apiKey);

    $isPaymentSuccessful = $gateway->processPayment($amount, $currency, $paymentMethod);

    if ($isPaymentSuccessful) {
        echo "Pagamento realizado com sucesso!";
    } else {
        echo "Falha no pagamento. Tente novamente.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
