<?php
namespace Teleconcept\Packages\Transaction\Client\Request\Create;

use Teleconcept\Packages\Transaction\Client\ClientInterface as TransactionClient;
use Teleconcept\Packages\Transaction\Client\Response\CreatePaymentInterface as CreateTransactionRequest;

/**
 * Class CreatePerCallPayment
 * @package Teleconcept\Packages\Transaction\Client\Request
 */
class CreatePerMinutePayment extends CreatePayment implements CreatePerMinutePaymentInterface
{
    private const IVR_CREATE_PER_MINUTE_PATH = '/payments/pincode-input/per-minute';

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

        parent::__construct(self::IVR_CREATE_PER_MINUTE_PATH, $client, $options);
    }

    /**
     * @return bool
     */
    final public function validate(): bool
    {
        $options = $this->options();

        switch (true) {
            case $options['outlet-id'] === null || $options['outlet-id'] < 1:
            case $options['duration'] === null || $options['duration'] < 1:
            case $options['country'] === null:
            case $options['tariff'] === null:
            case $options['ip-address'] === null || !filter_var($options['ip-address'], FILTER_FLAG_IPV4):
            case empty($options['report-url']) || !filter_var($options['report-url'], FILTER_VALIDATE_URL):
            case $options['adult'] === null:
                return false;
        }

        return true;
    }

    /**
     * @param int $duration
     * @return CreateTransactionRequest
     */
    final public function setDuration(int $duration): CreateTransactionRequest
    {
        $this->setOption('duration', $duration);
    }
}
