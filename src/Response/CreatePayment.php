<?php

namespace Teleconcept\Packages\Transaction\Ivr\Client\Response;

use Psr\Http\Message\ResponseInterface;

/**
 * Class CreateTransaction
 * @package Teleconcept\Packages\Transaction\Ivr\Client\Response
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
        $contents = json_decode($response->getBody()->getContents(), true);

        $this->pincode = $contents['data']['pincode'];
        $this->reference = $contents['data']['reference'];
        $this->payline = $contents['data']['payline'];
        $this->response = $contents;
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
