<?php
namespace Teleconcept\Packages\Transaction\Client\Request\Check;

use Psr\Http\Message\RequestInterface;
use Teleconcept\Packages\Transaction\Client\Response\CheckTransactionInterface as CheckTransactionResponse;

/**
 * Interface TransactionRequest
 * @package Teleconcept\Packages\Transaction\Client\Request
 */
interface CheckPaymentInterface extends RequestInterface
{
    /**
     * @param string $bearer
     * @return CheckPaymentInterface
     */
    public function setAuthorizationBearer(string $bearer): self;

    /**
     * @param int $transactionId
     * @return CheckPaymentInterface
     */
    public function setTransactionId(int $transactionId): self;

    /**
     * @return CheckTransactionResponse
     */
    public function send(): CheckTransactionResponse;
}
