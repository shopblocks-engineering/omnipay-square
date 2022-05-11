<?php

namespace Omnipay\Square\Message;

use Omnipay\Square\ConstantsInterface;

class CreateOrderRequest extends SquareAbstractRequest implements ConstantsInterface
{

    public function getData()
    {
        return [
            'idempotency_key' => $this->getIdempotencyKey(),
            'order' => (object)array(
                'line_items' => $this->parseLineItems(),
                'location_id' => $this->getLocationId(),
                'fulfillments' => [
                    (object)array(
                        'type' => 'SHIPMENT',
                        'shipment_details' => $this->getShipmentDetails(),
                        'state' => 'PROPOSED'
                    )
                ]
            ),

        ];
    }

    public function sendData($data)
    {
        $response = $this->httpClient->request(
            'POST',
            $this->getBaseEndpoint($this->getTestMode()) . '/v2/orders',
            $this->setHeaders(),
            json_encode($data)
        );

        return new OrderResponse($this, $response);
    }
}