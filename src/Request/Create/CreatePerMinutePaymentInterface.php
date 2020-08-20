<?php
namespace Teleconcept\Packages\Transaction\Ivr\Client\Request\Create;

/**
 * Interface CreatePerCallPaymentInterface
 * @package Teleconcept\Packages\Transaction\Ivr\Client\Request
 */
interface CreatePerMinutePaymentInterface extends CreatePaymentInterface
{
    /**
     * @param int $duration
     * @return CreatePerMinutePaymentInterface
     */
    public function setDuration(int $duration): CreatePerMinutePaymentInterface;
}
