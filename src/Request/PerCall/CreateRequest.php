<?php
namespace Teleconcept\Ivr\Client\Request\PerCall;

use GuzzleHttp\Exception\GuzzleException;
use Teleconcept\Ivr\Client\ClientInterface as Client;
use Teleconcept\Ivr\Client\Exception\ValidationException;
use Teleconcept\Ivr\Client\Request\PerCall\CreateRequestInterface as CreatePerCallRequest;
use Teleconcept\Ivr\Client\Request\Request;
use Teleconcept\Ivr\Client\Response\ResponseInterface as Response;
use function filter_var;
use function GuzzleHttp\Psr7\stream_for;
use function is_bool;
use function is_int;
use function is_numeric;
use function is_string;
use function json_encode;
use function strlen;

/**
 * Class CreateRequest
 * @package Teleconcept\Ivr\Client\Request\PerCall
 */
class CreateRequest extends Request implements CreatePerCallRequest
{
    /**
     * CreateRequest constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        parent::__construct('POST', '/payments/pincode-input/per-call');
    }

    /**
     * @return Response
     * @throws ValidationException
     * @throws GuzzleException
     */
    final public function send(): Response
    {
        $errors = $this->validate();

        if (!empty($errors)) {
            throw new ValidationException($errors);
        }

        $body = stream_for(json_encode($this->options));
        $request = $this->withBody($body);

        foreach ($this->headers as $header => $value) {
            $request = $request->withAddedHeader($header, $value);
        }

        return $this->client->createPerCall($request);
    }

    /**
     * @inheritDoc
     */
    final public function setOutletId(int $outletId): CreatePerCallRequest
    {
        $this->headers['Outlet'] = $outletId;
        return $this->setOption('outlet-id', $outletId);
    }

    /**
     * @inheritDoc
     */
    final public function setCountry(string $country): CreatePerCallRequest
    {
        return $this->setOption('country', $country);
    }

    /**
     * @inheritDoc
     */
    final public function setReportUrl(string $reportUrl): CreatePerCallRequest
    {
        return $this->setOption('report-url', $reportUrl);
    }

    /**
     * @inheritDoc
     */
    final public function setTariff(string $tariff): CreatePerCallRequest
    {
        return $this->setOption('tariff', $tariff);
    }

    /**
     * @inheritDoc
     */
    final public function setIpAddress(string $ipAddress): CreatePerCallRequest
    {
        return $this->setOption('ip-address', $ipAddress);
    }

    /**
     * @inheritDoc
     */
    final public function setAdult(bool $adult): CreatePerCallRequest
    {
        return $this->setOption('adult', $adult);
    }

    /**
     * @return array
     */
    private function validate(): array
    {
        $options = $this->options;
        $errors = $this->validateHeaders();
/*
        if (!isset($options['outlet-id'])) {
            $errors['outletId'] = 'was not set.';
        } elseif (!is_int($options['outlet-id'])) {
            $errors['outletId'] = 'has to be an integer.';
        } elseif ($options['outlet-id'] < 1) {
            $errors['outletId'] = 'has to be equal or greater than 1.';
        }
*/
        if (!isset($options['country'])) {
            $errors['country'] = 'was not set.';
        } elseif (!is_string($options['country'])) {
            $errors['outletId'] = 'has to be a string.';
        } elseif (strlen($options['country']) !== 3) {
            $errors['outletId'] = 'has to be exactly 3 characters long.';
        }

        if (!isset($options['report-url'])) {
            $errors['reportUrl'] = 'was not set.';
        } elseif (!filter_var($options['report-url'], FILTER_VALIDATE_URL)) {
            $errors['reportUrl'] = 'invalid url was supplied.';
        }

        if (!isset($options['tariff'])) {
            $errors['tariff'] = 'was not set.';
        } elseif (!is_string($options['tariff'])) {
            $errors['tariff'] = 'has to be a string.';
        } elseif (!is_numeric($options['tariff'])) {
            $errors['tariff'] = 'has to be numeric.';
        } elseif (strlen($options['country']) !== 3) {
            $errors['tariff'] = 'has to be between 2 and 3 numerals long.';
        }

        if (!isset($options['ip-address'])) {
            $errors['ipAddress'] = 'was not set.';
        } elseif (!filter_var($options['ip-address'], FILTER_VALIDATE_IP)) {
            $errors['ipAddress'] = 'invalid ip address was supplied.';
        }

        if (!isset($options['adult'])) {
            $errors['adult'] = 'was not set.';
        } elseif (!is_bool($options['adult'])) {
            $errors['adult'] = 'has to be a boolean.';
        }

        return $errors;
    }
}
