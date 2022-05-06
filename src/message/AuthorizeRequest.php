<?php

namespace Omnipay\Square\Message;

use Omnipay\Square\ConstantsInterface;

class AuthorizeRequest extends SquareAbstractRequest implements ConstantsInterface
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
            'autocomplete' => false,
            'verification_token' => $this->getVerificationToken()
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

        return new AuthorizeResponse($this, $response);
    }
}