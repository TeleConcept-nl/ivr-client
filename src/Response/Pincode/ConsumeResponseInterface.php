<?php
namespace Teleconcept\Ivr\Client\Response\Pincode;

use Teleconcept\Ivr\Client\Response\ResponseInterface;

/**
 * Interface ConsumeResponseInterface
 * @package Teleconcept\Ivr\Client\Response\Pincode
 */
interface ConsumeResponseInterface extends ResponseInterface
{
    /**
     * @return string
     */
    public function reference(): string;
}
