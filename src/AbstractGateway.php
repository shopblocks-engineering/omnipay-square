<?php

namespace Omnipay\Square;

use Omnipay\Common\AbstractGateway as OmnipayAbstractGateway;

abstract class AbstractGateway extends OmnipayAbstractGateway implements ConstantsInterface
{
    /**
     * Examples for language: EN, DE and FR.
     * Also supports a locale format.
     */
    public function getDefaultParameters()
    {
        return [
            'vendor' => null,
            'testMode' => false,
            'referrerId' => null,
            'language' => null,
            'useOldBasketFormat' => false,
            'exitOnResponse' => false,
            'apply3DSecure' => null,
            'useAuthenticate' => null,
            'accountType' => null,
            'application_id' => null,
            'access_token' => null,
            'location_id' => null
        ];
    }
}
