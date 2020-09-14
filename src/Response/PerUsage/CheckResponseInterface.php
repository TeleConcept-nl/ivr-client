<?php
namespace Teleconcept\Ivr\Client\Response\PerUsage;

use Teleconcept\Ivr\Client\Response\ResponseInterface;

/**
 * Interface CheckResponseInterface
 * @package Teleconcept\Ivr\Client\Response\PerUsage
 */
interface CheckResponseInterface extends ResponseInterface
{
    /**
     * @return string
     */
    public function status(): string;
}
