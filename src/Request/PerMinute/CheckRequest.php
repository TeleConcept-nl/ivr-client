<?php
namespace Teleconcept\Ivr\Client\Request\PerMinute;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Uri;
use Teleconcept\Ivr\Client\ClientInterface as Client;
use Teleconcept\Ivr\Client\Exception\ValidationException;
use Teleconcept\Ivr\Client\Request\PerMinute\CheckRequestInterface as CheckPerMinuteRequest;
use Teleconcept\Ivr\Client\Request\Request;
use Teleconcept\Ivr\Client\Response\ResponseInterface as Response;
use function GuzzleHttp\Psr7\stream_for;
use function is_string;
use function json_encode;
use function strlen;

/**
 * Class CheckRequest
 * @package Teleconcept\Ivr\Client\Request\PerMinute
 */
class CheckRequest extends Request implements CheckPerMinuteRequest
{
    private const IVR_CREATE_PER_MINUTE_PATH = '/%s';

    /**
     * CheckRequest constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        parent::__construct('GET', '/payments/pincode-input/per-minute');
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
        $uri = new Uri('/payments/pincode-input/per-call/' . $this->options['reference']);
        $request = $this
            ->withBody($body)
            ->withUri($uri);


        foreach ($this->headers as $header => $value) {
            $request = $request->withAddedHeader($header, $value);
        }

        return $this->client->checkPerMinute($request);
    }

    /**
     * @param string $transactionReference
     * @return CheckPerMinuteRequest
     */
    final public function setTransactionReference(string $transactionReference): CheckPerMinuteRequest
    {
        return $this->setOption('reference', $transactionReference);
    }

    /**
     * @return array
     */
    private function validate(): array
    {
        $options = $this->options;
        $errors = $this->validateHeaders();

        if ($options['reference'] === null) {
            $errors['reference'] = 'was not set.';
        } elseif (!is_string($options['reference'])) {
            $errors['reference'] = 'has to be a string.';
        } elseif (strlen($options['reference']) !== 36) {
            $errors['reference'] = 'has to be 36 characters long.';
        }

        return $errors;
    }
}
