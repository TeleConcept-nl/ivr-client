<?php
namespace Teleconcept\Ivr\Client\Request\PerMinute;

use Teleconcept\Ivr\Client\Request\RequestInterface;

/**
 * Interface CreatePerCallPaymentInterface
 * @package Teleconcept\Ivr\Client\Request
 */
interface CreateRequestInterface extends RequestInterface
{
    /**
     * @param int $duration
     * @return CreateRequestInterface
     */
    public function setDuration(int $duration): CreateRequestInterface;
}
