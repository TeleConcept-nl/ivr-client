<?php

namespace Teleconcept\Packages\Transaction\Client\Response;

use Psr\Http\Message\ResponseInterface;

/**
 * Class CreateTransaction
 * @package Teleconcept\Packages\Transaction\Client\Response
 */
class CreatePayment implements CreatePaymentInterface
{
    /**
     * @var string
     */
    private $pincode;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var string
     */
    private $payline;

    /**
     * @var array
     */
    private $response;

    /**
     * CreateTransaction constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $data = json_decode($response->getBody()->getContents(), true);

        $this->pincode = $data['pincode'];
        $this->reference = $data['reference'];
        $this->payline = $data['payline'];
        $this->response = $data;
    }

    /**
     * @return string
     */
    final public function pincode(): string
    {
        return $this->pincode;
    }

    /**
     * @return string
     */
    final public function reference(): string
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    final public function payline(): string
    {
        return $this->payline;
    }

    /**
     * @return array
     */
    final public function response(): array
    {
        return $this->response;
    }
}
