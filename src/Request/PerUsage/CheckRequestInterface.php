<?php
namespace Teleconcept\Ivr\Client\Request\PerUsage;

use Teleconcept\Ivr\Client\Request\Check\CheckPaymentInterface;
use Teleconcept\Ivr\Client\Request\RequestInterface;

/**
 * Interface CheckPerCallPaymentInterface
 * @package Teleconcept\Ivr\Client\Request\Check
 */
interface CheckRequestInterface extends RequestInterface
{
    /**
     * @param string $transactionReference
     * @return $this
     */
    public function setTransactionReference(string $transactionReference): self;
}
