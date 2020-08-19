<?php
namespace Teleconcept\Packages\Transaction\Client\Request\Check;

use Teleconcept\Packages\Transaction\Client\ClientInterface as TransactionClient;

/**
 * Class CheckPerCallPayment
 * @package Teleconcept\Packages\Transaction\Client\Request\Check
 */
class CheckPerCallPayment extends CheckPayment implements CheckPerCallPaymentInterface
{
    private const IVR_CREATE_PER_CALL_PATH = '/payments/pincode-input/per-call/%d';

    /**
     * CheckPerCallPayment constructor.
     * @param TransactionClient $client
     */
    public function __construct(TransactionClient $client)
    {
        parent::__construct(self::IVR_CREATE_PER_CALL_PATH, $client);
    }
}
