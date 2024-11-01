<?php
class PaymentGateway {
    private $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    // Método para processar o pagamento
    public function processPayment($amount, $currency, $paymentMethod) {
        // Exemplo de requisição para o gateway (usando Stripe como exemplo)
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.stripe.com/v1/charges");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            "amount" => $amount * 100, // Stripe espera o valor em centavos
            "currency" => $currency,
            "source" => $paymentMethod
        ]));
        curl_setopt($ch, CURLOPT_USERPWD, $this->apiKey . ":");

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Erro:' . curl_error($ch);
            return false;
        }
        curl_close($ch);

        $response = json_decode($result, true);
        if (isset($response['status']) && $response['status'] == 'succeeded') {
            return true;
        } else {
            return false;
        }
    }
}
?>
