<?php

namespace Teleconcept\Packages\Transaction\Ivr\Client\Response;

/**
 * Interface TransactionResponse
 * @package Teleconcept\Packages\Transaction\Ivr\Client\Response
 */
interface CheckTransactionInterface
{
    /**
     * @return string
     */
    public function status(): string;
}
