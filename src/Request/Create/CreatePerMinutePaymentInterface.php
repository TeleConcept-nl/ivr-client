<?php
namespace Teleconcept\Packages\Transaction\Client\Request\Create;

/**
 * Interface CreatePerCallPaymentInterface
 * @package Teleconcept\Packages\Transaction\Client\Request
 */
interface CreatePerMinutePaymentInterface extends CreatePaymentInterface
{
    /**
     * @param int $duration
     * @return CreatePerMinutePaymentInterface
     */
    public function setDuration(int $duration): CreatePerMinutePaymentInterface;
}
