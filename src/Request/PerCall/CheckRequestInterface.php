<?php
namespace Teleconcept\Ivr\Client\Request\PerCall;

use Teleconcept\Ivr\Client\Request\Check\CheckPaymentInterface;
use Teleconcept\Ivr\Client\Request\RequestInterface as Request;

/**
 * Interface CheckRequestInterface
 * @package Teleconcept\Ivr\Client\Request\PerCall
 */
interface CheckRequestInterface extends Request
{
    /**
     * @param string $transactionReference
     * @return $this
     */
    public function setTransactionReference(string $transactionReference): self;
}
