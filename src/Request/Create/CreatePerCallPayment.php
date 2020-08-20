<?php
namespace Teleconcept\Packages\Transaction\Ivr\Client\Request\Create;

use Teleconcept\Packages\Transaction\Ivr\Client\ClientInterface as TransactionClient;

/**
 * Class CreatePerCallPayment
 * @package Teleconcept\Packages\Transaction\Ivr\Client\Request
 */
class CreatePerCallPayment extends CreatePayment implements CreatePerCallPaymentInterface
{
    private const IVR_CREATE_PER_CALL_PATH = '/payments/pincode-input/per-call';

    /**
     * CreatePerMinutePayment constructor.
     * @param TransactionClient $client
     */
    public function __construct(TransactionClient $client)
    {
        $options = [
            'outlet-id' => null,
            'country' => null,
            'report-url' => null,
            'tariff' => null,
            'adult' => null,
            'ip-address' => null,
            'duration' => null
        ];

        parent::__construct(self::IVR_CREATE_PER_CALL_PATH, $client, $options);
    }

    /**
     * @return bool
     */
    final public function validate(): bool
    {
        $options = $this->options();

        switch (true) {
            case $options['outlet-id'] === null || $options['outlet-id'] < 1:
            case $options['country'] === null:
            case $options['tariff'] === null:
            case $options['ip-address'] === null || !filter_var($options['ip-address'], FILTER_VALIDATE_IP):
            case empty($options['report-url']) || !filter_var($options['report-url'], FILTER_VALIDATE_URL):
            case $options['adult'] === null:
                return false;
        }

        return true;
    }
}
