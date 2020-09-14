<?php
namespace Teleconcept\Ivr\Client\Response\Error;

use Teleconcept\Ivr\Client\Response\ResponseInterface as Response;

/**
 * Class UnauthorizedResponse
 * @package Teleconcept\Ivr\Client\Response\Error
 */
interface UnauthorizedResponseInterface extends Response
{
    /**
     * @return string
     */
    public function detail(): string;
}
