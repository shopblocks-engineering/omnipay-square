<?php

namespace Omnipay\Square;

use Omnipay\Square\Message\CompleteAuthorizeRequest;
use Omnipay\Square\Message\CreateOrderRequest;
use Omnipay\Square\Message\PurchaseRequest;
use Omnipay\Square\Message\AuthorizeRequest;
use Omnipay\Square\Traits\GatewayParameters;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Common\Message\AbstractRequest;

class Gateway extends AbstractGateway implements ConstantsInterface
{
    use GatewayParameters;

    protected $paymentProvider = 'Square';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->paymentProvider;
    }

    /**
     * @param array $options
     * @return AbstractRequest
     */
    public function createOrder(array $options = [])
    {
        return $this->createRequest(CreateOrderRequest::class, $options);
    }


    /**
     * @param array $options
     * @return AbstractRequest|RequestInterface
     */
    public function purchase(array $options = [])
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    /**
     * @param array $options
     * @return AbstractRequest|RequestInterface
     */
    public function authorize(array $options = array())
    {
        return $this->createRequest(AuthorizeRequest::class, $options);
    }

    /**
     * @param array $options
     * @return AbstractRequest|RequestInterface
     */
    public function completeAuthorize(array $options = array())
    {
        return $this->createRequest(CompleteAuthorizeRequest::class, $options);
    }
}