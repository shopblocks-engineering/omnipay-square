<?php

namespace Omnipay\Square\Message;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Square\ConstantsInterface;
use Omnipay\Square\Traits\GatewayParameters;

abstract class SquareAbstractRequest extends AbstractRequest implements ConstantsInterface
{
    use GatewayParameters;

    /**
     * @var string Endpoint base URLs.
     */
    static $liveEndpoint = 'https://lconnect.squareupsandbox.com';
    static $testEndpoint = 'https://connect.squareupsandbox.com';

    /**
     * @param bool $test
     * @return string
     */
    public static function getBaseEndpoint(bool $test = false): string
    {
        return $test ? static::$testEndpoint : static::$liveEndpoint;
    }

    /**
     * @return string[]
     */
    public function setHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getAccessToken(),
            'Square-Version' => self::SQUARE_VERSION,

        ];
    }

    /**
     * @return array
     */
    public function parseLineItems(): array
    {
        $parsedItems = array();

        foreach($this->getLineItems() as $lineItem){
            if (intval($lineItem['gross'] * 100) > 0){
                $parsedItems[] = array(
                    "quantity" => $lineItem['quantity'],
                    "name" => $lineItem['item']['name'],
                    "item_type" => "ITEM",
                    "base_price_money" => (object)array(
                        "amount" => intval(($lineItem['item']['price']['net']) * 100),
                        "currency" => $this->getCurrency()
                    )
                );
            }
        }

        return $parsedItems;
    }

    /**
     * @return string
     * @throws \JsonException
     */
    public function createSquareOrderId(): string
    {
        $orderResponse = $this->httpClient->request(
            'POST',
            $this->getBaseEndpoint($this->getTestMode()) . '/v2/orders',
            $this->setHeaders(),
            json_encode([
                'idempotency_key' => $this->getIdempotencyKey(),
                'order' => (object)array(
                    'line_items' => $this->parseLineItems(),
                    'location_id' => $this->getLocationId()
                ),

            ])
        );

        $response = new OrderResponse($this, $orderResponse);

        if (!$response->isSuccessful()) {
            throw new \JsonException(json_encode($response->getMessage()));
        }
        return $response->getOrderId();
    }
}