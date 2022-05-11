<?php

namespace Omnipay\Square\Message;

use Omnipay\Square\ConstantsInterface;

class PurchaseRequest extends SquareAbstractRequest implements ConstantsInterface
{
    /**
     * @return array
     * @throws \JsonException
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        return [
            'amount_money' => [
                'amount' => intval($this->getAmount()),
                'currency' => $this->getCurrency()
            ],
            'source_id' => $this->getSourceId(),
            'idempotency_key' => $this->getIdempotencyKey(),
            'autocomplete' => true,
            'verification_token' => $this->getVerificationToken(),
            'order_id' => $this->getSquareOrderId(),
            'billing_address' => $this->getBillingDetails(),
            'buyer_email_address' => $this->getCustomerEmail()
        ];
    }

    /**
     * @param $data
     * @return mixed|\Omnipay\Common\Message\ResponseInterface
     */
    public function sendData($data)
    {
        $response = $this->httpClient->request(
            'POST',
            $this->getBaseEndpoint($this->getTestMode()) . '/v2/payments',
            $this->setHeaders(),
            json_encode($data)
        );

        return new PurchaseResponse($this, $response);
    }
}