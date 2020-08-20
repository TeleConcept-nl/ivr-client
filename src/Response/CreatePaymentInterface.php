<?php

namespace Teleconcept\Packages\Transaction\Ivr\Client\Response;

/**
 * Interface TransactionResponse
 * @package Teleconcept\Packages\Transaction\Ivr\Client\Response
 */
interface CreatePaymentInterface
{
    /**
     * @return string
     */
    public function pincode(): string;

    /**
     * @return string
     */
    public function reference(): string;

    /**
     * @return string
     */
    public function payline(): string;

    /**
     * @return array
     */
    public function response(): array;
}
