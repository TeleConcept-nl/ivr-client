<?php
namespace Teleconcept\Ivr\Client\Response\PerMinute;

use Teleconcept\Ivr\Client\Response\ResponseInterface;

/**
 * Interface CheckResponseInterface
 * @package Teleconcept\Ivr\Client\Response\PerMinute
 */
interface CheckResponseInterface extends ResponseInterface
{
    /**
     * @return string
     */
    public function status(): string;
}
