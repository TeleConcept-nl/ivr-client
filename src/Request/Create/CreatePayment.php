<?php
namespace Teleconcept\Packages\Transaction\Client\Request\Create;

use BadMethodCallException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use Teleconcept\Packages\Transaction\Client\ClientInterface as PaymentClient;
use Teleconcept\Packages\Transaction\Client\Request\Create\CreatePaymentInterface as CreatePaymentRequest;
use Teleconcept\Packages\Transaction\Client\Response\CreatePaymentInterface as CreatePaymentResponse;
use function GuzzleHttp\Psr7\stream_for;

/**
 * Class CreatePayment
 * @package Teleconcept\Packages\Transaction\Client\Request
 */
abstract class CreatePayment extends Request implements CreatePaymentRequest
{
    /**
     * @var PaymentClient
     */
    private $client;

    /**
     * @var array
     */
    private $options;

    /**
     * @var array
     */
    private $headers = [
        'Content-Type' => 'application/json'
    ];

    /**
     * CreatePayment constructor.
     * @param string $path
     * @param PaymentClient $client
     * @param array $options
     */
    public function __construct(string $path, PaymentClient $client, array $options = [])
    {
        parent::__construct('POST', $path);
        $this->client = $client;
        $this->options = $options;
    }

    /**
     * @inheritDoc
     */
    final public function setOutletId(int $outletId): CreatePaymentRequest
    {
        return $this->setOption('outlet-id', $outletId);
    }

    /**
     * @inheritDoc
     */
    final public function setCountry(string $country): CreatePaymentRequest
    {
        return $this->setOption('country', $country);
    }

    /**
     * @inheritDoc
     */
    final public function setReportUrl(string $reportUrl): CreatePaymentRequest
    {
        return $this->setOption('report-url', $reportUrl);
    }

    /**
     * @inheritDoc
     */
    final public function setTariff(string $tariff): CreatePaymentRequest
    {
        return $this->setOption('tariff', $tariff);
    }

    /**
     * @inheritDoc
     */
    final public function setIpAddress(string $ipAddress): CreatePaymentRequest
    {
        return $this->setOption('ip-address', $ipAddress);
    }

    /**
     * @inheritDoc
     */
    final public function setAdult(bool $adult): CreatePaymentRequest
    {
        return $this->setOption('adult', $adult);
    }

    /**
     * @inheritDoc
     */
    final public function setAuthorizationBearer(string $bearer): CreatePaymentRequest
    {
        $this->headers['Authorization'] = 'Bearer ' . $bearer;
        return $this;
    }

    /**
     * @return CreatePaymentResponse
     * @throws GuzzleException
     */
    final public function send(): CreatePaymentResponse
    {
        if (!$this->validate()) {
            throw new BadMethodCallException('Missing required options');
        }

        $request = $this->buildRequest();

        foreach ($this->headers as $header => $value) {
            $request = $request->withAddedHeader($header, $value);
        }

        $response = $this->client->createPayment($request);

        return new \Teleconcept\Packages\Transaction\Client\Response\CreatePayment($response);
    }

    /**
     * @return array
     */
    final public function options(): array
    {
        return $this->options;
    }

    /**
     * @return CreatePaymentRequest
     */
    private function buildRequest(): CreatePaymentRequest
    {
        $body = stream_for(json_encode([
            $this->options
        ]));

        return $this->withBody($body);
    }


    /**
     * @param string $option
     * @param $value
     * @return CreatePaymentRequest
     */
    final public function setOption(string $option, $value): CreatePaymentRequest
    {
        if (array_key_exists($option, $this->options) && $this->options[$option] !== $value) {
            $this->options[$option] = $value;
        }

        return $this;
    }
}
