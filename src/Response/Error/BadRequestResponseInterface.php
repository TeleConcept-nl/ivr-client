<?php
namespace Teleconcept\Ivr\Client\Response\Error;


use Teleconcept\Ivr\Client\Response\ResponseInterface;

/**
 * Class NotFoundResponse
 * @package Teleconcept\Ivr\Client\Response\Error
 */
interface BadRequestResponseInterface extends ResponseInterface
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
