<?php
namespace Teleconcept\Ivr\Client\Response\Pincode;

use Psr\Http\Message\ResponseInterface;
use function json_decode;

/**
 * Class ConsumeResponse
 * @package Teleconcept\Ivr\Client\Response\Pincode
 */
class ConsumeResponse implements ConsumeResponseInterface
{
    /**
     * @var string
     */
    private $reference;

    /**
     * CreateTransaction constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $content = json_decode($response->getBody()->getContents(), true);
        $this->reference = $content['data']['reference'];
    }

    /**
     * @inheritDoc
     */
    final public function reference(): string
    {
        return $this->reference;
    }
}
