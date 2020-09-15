<?php
namespace Teleconcept\Ivr\Client\Request\Pincode;

use GuzzleHttp\Psr7\Uri;
use Teleconcept\Ivr\Client\ClientInterface as Client;
use Teleconcept\Ivr\Client\Exception\ValidationException;
use Teleconcept\Ivr\Client\Request\Request;
use Teleconcept\Ivr\Client\Response\ResponseInterface as Response;
use function GuzzleHttp\Psr7\stream_for;
use function json_encode;

/**
 * Class ConsumeRequest
 * @package Teleconcept\Ivr\Client\Request\Pincode
 */
class ConsumeRequest extends Request implements ConsumeRequestInterface
{
    /**
     * CheckRequest constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        parent::__construct('GET', '/payments/pincode-output/%s');
    }

    /**
     * @return Response
     * @throws ValidationException
     */
    final public function send(): Response
    {
        $errors = $this->validate();

        if (!empty($errors)) {
            throw new ValidationException($errors);
        }

        $body = stream_for(json_encode($this->options));
        $uri = new Uri('/payments/pincode-output/' . $this->options['pincode']);
        $request = $this
            ->withBody($body)
            ->withUri($uri);


        foreach ($this->headers as $header => $value) {
            $request = $request->withAddedHeader($header, $value);
        }

        return $this->client->consumePincode($request);
    }

    /**
     * @inheritDoc
     */
    final public function setPincode(string $pincode): ConsumeRequestInterface
    {
        return $this->setOption('pincode', $pincode);
    }

    /**
     * @return array
     */
    private function validate(): array
    {
        return [];
    }
}
