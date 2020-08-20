<?php
namespace Teleconcept\Packages\Transaction\Ivr\Client\Request\Check;

use Teleconcept\Packages\Transaction\Ivr\Client\ClientInterface as TransactionClient;

/**
 * Class CheckPerMinutePayment
 * @package Teleconcept\Packages\Transaction\Ivr\Client\Request\Check
 */
class CheckPerMinutePayment extends CheckPayment implements CheckPerMinutePaymentInterface
{
    private const IVR_CREATE_PER_MINUTE_PATH = '/payments/pincode-input/per-minute/%s';

    /**
     * CheckPerCallPayment constructor.
     * @param TransactionClient $client
     */
    public function __construct(TransactionClient $client)
    {
        parent::__construct(self::IVR_CREATE_PER_MINUTE_PATH, $client);
    }
}
