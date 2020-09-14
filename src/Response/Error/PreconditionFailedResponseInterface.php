<?php
namespace Teleconcept\Ivr\Client\Response\Error;


use Teleconcept\Ivr\Client\Response\ResponseInterface as Response;

/**
 * Class PreconditionFailedResponse
 * @package Teleconcept\Ivr\Client\Response\Error
 */
interface PreconditionFailedResponseInterface extends Response
{
    /**
     * @return array
     */
    public function detail(): array;

    /**
     * @return string
     */
    public function documentation(): string;
}
