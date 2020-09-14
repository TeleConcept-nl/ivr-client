<?php
namespace Teleconcept\Ivr\Client\Request\PerMinute;

use GuzzleHttp\Exception\GuzzleException;
use Teleconcept\Ivr\Client\ClientInterface as Client;
use Teleconcept\Ivr\Client\Exception\ValidationException;
use Teleconcept\Ivr\Client\Request\PerCall\CreateRequestInterface as CreatePerCallRequest;
use Teleconcept\Ivr\Client\Request\PerMinute\CreateRequestInterface as CreatePerMinuteRequest;
use Teleconcept\Ivr\Client\Request\Request;
use Teleconcept\Ivr\Client\Response\ResponseInterface as Response;
use function filter_var;
use function GuzzleHttp\Psr7\stream_for;
use function is_array;
use function is_bool;
use function is_int;
use function is_numeric;
use function is_string;
use function json_encode;
use function strlen;

/**
 * Class CreateRequest
 * @package Teleconcept\Ivr\Client\Request\PerMinute
 */
class CreateRequest extends Request implements CreateRequestInterface
{
    /**
     * CreateRequest constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        parent::__construct('POST', '/payments/pincode-input/per-minute');
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

        return $this->client->createPerMinute($request);
    }

    /**
     * @inheritDoc
     */
    final public function setOutletId(int $outletId): CreatePerMinuteRequest
    {
        $this->headers['Outlet'] = $outletId;
        return $this->setOption('outlet-id', $outletId);
    }

    /**
     * @inheritDoc
     */
    final public function setCountry(string $country): CreatePerMinuteRequest
    {
        return $this->setOption('country', $country);
    }

    /**
     * @inheritDoc
     */
    final public function setReportUrl(string $reportUrl): CreatePerMinuteRequest
    {
        return $this->setOption('report-url', $reportUrl);
    }

    /**
     * @inheritDoc
     */
    final public function setTariff(string $tariff): CreatePerMinuteRequest
    {
        return $this->setOption('tariff', $tariff);
    }

    /**
     * @inheritDoc
     */
    final public function setIpAddress(string $ipAddress): CreatePerMinuteRequest
    {
        return $this->setOption('ip-address', $ipAddress);
    }

    /**
     * @inheritDoc
     */
    final public function setAdult(bool $adult): CreatePerMinuteRequest
    {
        return $this->setOption('adult', $adult);
    }

    /**
     * @inheritDoc
     */
    final public function setDuration(int $duration): CreatePerMinuteRequest
    {
        $this->setOption('duration', $duration);
        return $this;
    }

    /**
     * @return array
     */
    final public function validate(): array
    {
        $options = $this->options;

        $errors = $this->validateHeaders();

        if (!isset($options['outlet-id'])) {
            $errors['$outletId'] = 'was not supplied.';
        } elseif (!is_int($options['outlet-id'])) {
            $errors['$outletId'] = 'has to be an integer.';
        } elseif ($options['outlet-id'] < 1) {
            $errors['$outletId'] = 'has to be greater than zero.';
        }

        if (!isset($options['country'])) {
            $errors['$country'] = 'was not set.';
        } elseif (!is_string($options['country'])) {
            $errors['$country'] = 'has to be a string.';
        } elseif (strlen($options['country']) !== 3) {
            $errors['$country'] = 'has to be exactly 3 characters.';
        }

        if (!isset($options['report-url'])) {
            $errors['$reportUrl'] = 'was not supplied.';
        } elseif (!filter_var($options['report-url'], FILTER_VALIDATE_URL)) {
            $errors['$reportUrl'] = 'has to be a URL.';
        }

        if (!isset($options['tariff'])) {
            $errors['$tariff'] = 'was not supplied.';
        } elseif (!is_string($options['tariff'])) {
            $errors['$tariff'] = 'has to be a string.';
        } elseif (!is_numeric($options['tariff'])) {
            $errors['$tariff'] = 'has to be numeric.';
        } elseif ($options['tariff'] < 1) {
            $errors['$tariff'] = 'has to be greater than zero.';
        }

        if (!isset($options['ip-address'])) {
            $errors['$ipAddress'] = 'was not supplied.';
        }  elseif (!filter_var($options['ip-address'], FILTER_VALIDATE_IP)) {
            $errors['$ipAddress'] = 'has to be an ip address.';
        }

        if (!isset($options['adult'])) {
            $errors['$adult'] = 'was not supplied.';
        }  elseif (!is_bool($options['adult'])) {
            $errors['$adult'] = 'has to be a boolean.';
        }

        if (!isset($options['duration'])) {
            $errors['$duration'] = 'was not supplied.';
        } elseif (!is_int($options['duration'])) {
            $errors['$duration'] = 'has to be an integer.';
        } elseif ($options['duration'] < 1) {
            $errors['$duration'] = 'has to be greater than zero.';
        }

        return $errors;
    }
}
