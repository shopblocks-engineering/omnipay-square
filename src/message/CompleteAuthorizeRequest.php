<?php

namespace Omnipay\Square\Message;

use Omnipay\Square\ConstantsInterface;

class CompleteAuthorizeRequest extends SquareAbstractRequest implements ConstantsInterface
{
    /**
     * @return array
     */
    public function getData(): array
    {
        return [];
    }

    /**
     * @param $data
     * @return CompleteAuthorizeResponse
     */
    public function sendData($data): CompleteAuthorizeResponse
    {
        $response = $this->httpClient->request(
            'POST',
            $this->getBaseEndpoint($this->getTestMode()) . '/v2/payments/' . $this->getTransactionReference() . '/complete',
            $this->setHeaders()
        );

        return new CompleteAuthorizeResponse($this, $response);
    }
}