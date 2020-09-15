<?php
namespace Teleconcept\Ivr\Client\Request\Pincode;

use Teleconcept\Ivr\Client\Request\RequestInterface;

/**
 * Interface ConsumeRequestInterface
 * @package Teleconcept\Ivr\Client\Request\Pincode
 */
interface ConsumeRequestInterface extends RequestInterface
{
    /**
     * @param string $pincode
     * @return $this
     */
    public function setPincode(string $pincode): self;
}
