<?php

namespace Omnipay\Square\Message;

use Illuminate\Support\Facades\Log;
use Omnipay\Square\ConstantsInterface;

class PurchaseRequest extends SquareAbstractRequest implements ConstantsInterface
{
    /**
     * @return array
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
            'autocomplete' => true
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