<?php

namespace Omnipay\Square\Message;

use Omnipay\Square\ConstantsInterface;

class PurchaseRequest extends SquareAbstractRequest implements ConstantsInterface
{
    public function getData()
    {
        return [
//            'VPSProtocol' => $this->VPSProtocol,
            'TxType' => $this->getTxType(),
            'Vendor' => $this->getVendor(),
            'TestMode' => $this->getTestMode(),
        ];
    }

    public function sendData($data)
    {
        $response = $this->httpClient->post(
            'url',
            'headers',
            'body'
        );

        return json_decode($response);
    }
}