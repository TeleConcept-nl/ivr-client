<?php

namespace Teleconcept\Packages\Transaction\Client\Response;

/**
 * Interface TransactionResponse
 * @package Teleconcept\Packages\Transaction\Client\Response
 */
interface CheckTransactionInterface
{
    /**
     * @return string
     */
    public function status(): string;
}
