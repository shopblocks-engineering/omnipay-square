<?php

namespace Omnipay\Square\Traits;

trait GatewayParameters
{
    /**
     * @return mixed
     */
    public function setApplicationID(string $value)
    {
        return $this->setParameter('application_id', $value);
    }

    /**
     * @return mixed
     */
    public function setAccessToken(string $value)
    {
        return $this->setParameter('access_token', $value);
    }

    /**
     * @return string
     */
    public function getApplicationID(): string
    {
        return $this->getParameter('application_id');
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->getParameter('access_token');
    }

    /**
     * @return mixed true for old format basket; false for newer XML format basket.
     */
    public function getUseAuthenticate()
    {
        return $this->getParameter('useAuthenticate');
    }

    /**
     * @return string the transaction type
     */
    public function getTxType(): string
    {
        return static::TXTYPE_PAYMENT;
    }

    /**
     * @return string
     */
    public function getVendor(): string
    {
        return $this->getParameter('vendor');
    }
}