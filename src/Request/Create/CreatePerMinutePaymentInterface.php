<?php
namespace Teleconcept\Packages\Transaction\Client\Request\Create;

use Teleconcept\Packages\Transaction\Client\Response\CreatePaymentInterface as CreateTransactionRequest;

/**
 * Interface CreatePerCallPaymentInterface
 * @package Teleconcept\Packages\Transaction\Client\Request
 */
interface CreatePerMinutePaymentInterface extends CreatePaymentInterface
{
    /**
     * @param int $duration duration in seconds
     * @return CreateTransactionRequest
     */
    public function setDuration(int $duration): CreateTransactionRequest;
}
