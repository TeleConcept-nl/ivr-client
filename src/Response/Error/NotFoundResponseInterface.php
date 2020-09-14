<?php
namespace Teleconcept\Ivr\Client\Response\Error;


use Teleconcept\Ivr\Client\Response\ResponseInterface;

/**
 * Class NotFoundResponse
 * @package Teleconcept\Ivr\Client\Response\Error
 */
interface NotFoundResponseInterface extends ResponseInterface
{
    /**
     * @return string
     */
    public function detail(): string;

    /**
     * @return string
     */
    public function documentation(): string;
}
