<?php
namespace Teleconcept\Packages\Transaction\Ivr\Client\Request\Check;

use Psr\Http\Message\RequestInterface;
use Teleconcept\Packages\Transaction\Ivr\Client\Response\CheckTransactionInterface as CheckTransactionResponse;

/**
 * Interface TransactionRequest
 * @package Teleconcept\Packages\Transaction\Ivr\Client\Request
 */
interface CheckPaymentInterface extends RequestInterface
{
    /**
     * @param string $bearer
     * @return CheckPaymentInterface
     */
    public function setAuthorizationBearer(string $bearer): self;

    /**
     * @param int $outletId
     * @return $this
     */
    public function setOutletId(int $outletId): self;

    /**
     * @param string $transactionReference
     * @return $this
     */
    public function setTransactionReference(string $transactionReference): self;

    /**
     * @return CheckTransactionResponse
     */
    public function send(): CheckTransactionResponse;
}
