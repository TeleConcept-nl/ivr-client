<?php
namespace Teleconcept\Ivr\Client\Response\PerCall;

use Psr\Http\Message\ResponseInterface;

/**
 * Class CheckResponse
 * @package Teleconcept\Ivr\Client\Response\PerCall
 */
class CheckResponse implements CheckResponseInterface
{
    /**
     * @var string
     */
    private $status;

    /**
     * CreateTransaction constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $content = json_decode($response->getBody()->getContents(), true);
        $this->status = $content['data']['status'];
    }

    /**
     * @return string
     */
    final public function status(): string
    {
        return $this->status;
    }
}
