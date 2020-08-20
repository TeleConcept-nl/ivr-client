<?php

namespace Teleconcept\Packages\Transaction\Client\Response;

use Psr\Http\Message\ResponseInterface;

/**
 * Class CheckTransaction
 * @package Teleconcept\Packages\Transaction\Client\Response
 */
class CheckTransaction implements CheckTransactionInterface
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
