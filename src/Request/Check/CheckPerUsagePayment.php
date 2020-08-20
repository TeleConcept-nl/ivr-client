<?php
namespace Teleconcept\Packages\Transaction\Ivr\Client\Request\Check;

use Teleconcept\Packages\Transaction\Ivr\Client\ClientInterface as TransactionClient;

/**
 * Class CheckPerUsagePayment
 * @package Teleconcept\Packages\Transaction\Ivr\Client\Request\Check
 */
class CheckPerUsagePayment extends CheckPayment implements CheckPerUsagePaymentInterface
{
    private const IVR_CREATE_PER_USAGE_PATH = '/payments/pincode-input/per-usage/%s';

    /**
     * CheckPerCallPayment constructor.
     * @param TransactionClient $client
     */
    public function __construct(TransactionClient $client)
    {
        parent::__construct(self::IVR_CREATE_PER_USAGE_PATH, $client);
    }
}
