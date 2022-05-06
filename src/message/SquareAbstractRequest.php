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
}