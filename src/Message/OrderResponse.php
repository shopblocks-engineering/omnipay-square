<?php

namespace Omnipay\Square\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Common\Message\ResponseInterface;

class OrderResponse extends AbstractResponse implements ResponseInterface
{
    protected $request;
    protected $response;
    protected $responseBody;

    /**
     * @param RequestInterface $request
     * @param $response
     */
    public function __construct(RequestInterface $request, $response)
    {
        $this->request = $request;
        $this->response = $response;
        $this->responseBody = json_decode($response->getBody()->getContents());
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        if ($this->isSuccessful()) {
            $response = (array)$this->responseBody;
        } else {
            $response = [
                'code' => $this->response->getStatusCode(),
                'message' => $this->responseBody->errors[0],
                'error' => true
            ];
        }

        return $response;
    }

    /**
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return $this->response->getStatusCode() == 200;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return json_encode($this->responseBody->errors);
        $message = $this->responseBody->errors[0] ?? '';

        return $message->detail;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->responseBody->order->id;
    }
}