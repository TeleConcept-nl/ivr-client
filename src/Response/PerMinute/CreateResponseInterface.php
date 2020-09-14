<?php
namespace Teleconcept\Ivr\Client\Response\PerMinute;

use Teleconcept\Ivr\Client\Response\ResponseInterface;

/**
 * Interface CreateResponseInterface
 * @package Teleconcept\Ivr\Client\Response\PerMinute
 */
interface CreateResponseInterface extends ResponseInterface
{
    /**
     * @return string
     */
    public function pincode(): string;

    /**
     * @return string
     */
    public function reference(): string;

    /**
     * @return string
     */
    public function payline(): string;

    /**
     * @return array
     */
    public function response(): array;
}
