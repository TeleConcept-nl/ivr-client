<?php
namespace Teleconcept\Packages\Transaction\Client\Request\Create;

use Teleconcept\Packages\Transaction\Client\ClientInterface as TransactionClient;

/**
 * Class CreatePerUsagePayment
 * @package Teleconcept\Packages\Transaction\Client\Request
 */
class CreatePerUsagePayment extends CreatePayment implements CreatePerUsagePaymentInterface
{
    private const IVR_CREATE_PER_USAGE_PATH = '/payments/pincode-input/per-usage';

    /**
     * CreatePerUsagePayment constructor.
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
            'ip-address' => null
        ];

        parent::__construct(self::IVR_CREATE_PER_USAGE_PATH, $client, $options);
    }

    /**
     * @inheritDoc
     */
    final public function validate(): bool
    {
        $options = $this->options();

        switch (true) {
            case $options['outlet-id'] === null || $options['outlet-id'] < 1:
            case $options['country'] === null:
            case $options['tariff'] === null:
            case $options['ip-address'] === null || !filter_var($options['ip-address'], FILTER_FLAG_IPV4):
            case empty($options['report-url']) || !filter_var($options['report-url'], FILTER_VALIDATE_URL):
            case $options['adult'] === null:
                return false;
        }

        return true;
    }
}
