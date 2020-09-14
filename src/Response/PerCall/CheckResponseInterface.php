<?php
namespace Teleconcept\Ivr\Client\Response\PerCall;

use Teleconcept\Ivr\Client\Response\ResponseInterface;

/**
 * Interface CheckResponseInterface
 * @package Teleconcept\Ivr\Client\Response\PerCall
 */
interface CheckResponseInterface extends ResponseInterface
{
    /**
     * @return string
     */
    public function status(): string;
}
