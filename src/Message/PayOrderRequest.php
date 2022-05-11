<?php

namespace Omnipay\Square\Message;

use Omnipay\Square\ConstantsInterface;

class PayOrderRequest extends SquareAbstractRequest implements ConstantsInterface
{

    public function getData()
    {
        return [
            'idempotency_key' => $this->getIdempotencyKey(),
            'payment_ids' => [
                $this->getSquarePaymentId()
            ]
        ];
    }

    public function sendData($data)
    {
        $response = $this->httpClient->request(
            'POST',
            $this->getBaseEndpoint($this->getTestMode()) . '/v2/orders/' . $this->getSquareOrderId() . '/pay',
            $this->setHeaders(),
            json_encode($data)
        );

        return new PayOrderResponse($this, $response);
    }
}