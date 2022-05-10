<?php

namespace Omnipay\Square\Traits;

trait GatewayParameters
{
    /**
     * @return mixed
     */
    public function setApplicationID(string $value)
    {
        $this->setParameter('application_id', $value);
    }

    /**
     * @return mixed
     */
    public function setAccessToken(string $value)
    {
        $this->setParameter('access_token', $value);
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
     * @param string $value
     * @return void
     */
    public function setVendor(string $value)
    {
        $this->setParameter('vendor', $value);
    }

    /**
     * @return string
     */
    public function getVendor(): string
    {
        return $this->getParameter('vendor');
    }

    /**
     * @param string $value
     * @return void
     */
    public function setSourceId(string $value)
    {
        $this->setParameter('source_id', $value);
    }

    /**
     * @return string
     */
    public function getSourceId(): string
    {
        return $this->getParameter('source_id');
    }

    /**
     * @param string $value
     * @return void
     */
    public function setIdempotencyKey(string $value)
    {
        $this->setParameter('idempotency_key', $value);
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->getParameter('idempotency_key');
    }

    /**
     * @param string $value
     * @return void
     */
    public function setVerificationToken(string $value)
    {
        $this->setParameter('verificationToken', $value);
    }

    /**
     * @return string
     */
    public function getVerificationToken(): string
    {
        return $this->getParameter('verificationToken');
    }

    /**
     * @param string $value
     * @return void
     */
    public function setOrderId(string $value)
    {
        $this->setParameter('order_id', $value);
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->getParameter('order_id');
    }

    /**
     * @param $value
     * @return void
     */
    public function setLineItems($value)
    {
        $this->setParameter('line_items', $value);
    }

    /**
     * @return mixed
     */
    public function getLineItems()
    {
        return $this->getParameter('line_items');
    }

    /**
     * @param string $value
     * @return void
     */
    public function setCurrency($value)
    {
        $this->setParameter('currency', $value);
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return strtoupper($this->getParameter('currency'));
    }

    /**
     * @param string $value
     * @return void
     */
    public function setLocationId($value)
    {
        $this->setParameter('location_id', $value);
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->getParameter('location_id');
    }
}