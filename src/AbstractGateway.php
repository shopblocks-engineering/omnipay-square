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
            'application_id' => null,
            'access_token' => null,
            'location_id' => null
        ];
    }
}
