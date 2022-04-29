<?php

namespace Omnipay\SagePay;

use Omnipay\Square\AbstractGateway;
use Omnipay\Square\Message\PurchaseRequest;
use Omnipay\Square\Traits\GatewayParameters;
use Omnipay\Square\ConstantsInterface;

class Gateway extends AbstractGateway implements ConstantsInterface
{
    use GatewayParameters;

    protected string $paymentProvider = 'Square';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->paymentProvider;
    }

    /**
     * @param array $parameters
     * @return \Omnipay\Common\Message\AbstractRequest|\Omnipay\Common\Message\RequestInterface
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    /**
     * Authorize a payment.
     */
    public function authorize(array $parameters = array())
    {
//        return $this->createRequest(AuthorizeRequest::class, $parameters);
    }

    /**
     *
     */
    public function completeAuthorize(array $parameters = array())
    {
//        return $this->createRequest(CompleteAuthorizeRequest::class, $parameters);
    }
}