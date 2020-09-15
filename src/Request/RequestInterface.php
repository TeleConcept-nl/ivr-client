<?php
namespace Teleconcept\Ivr\Client\Request;

use Teleconcept\Ivr\Client\Response\ResponseInterface as Response;

/**
 * Interface RequestInterface
 * @package Teleconcept\Packages\Sms\Client\Request
 */
interface RequestInterface extends \Psr\Http\Message\RequestInterface
{
    /**
     * @param string $apiToken
     * @param int $outletId
     * @return RequestInterface
     */
    public function setAuthorization(string $apiToken, int $outletId): RequestInterface;

    /**
     * @param string $option
     * @param mixed $value
     * @return RequestInterface
     */
    public function setOption(string $option, $value): RequestInterface;

    /**
     * @return Response
     */
    public function send(): Response;

    /**
     * @return array
     */
    public function validateHeaders(): array;

    /**
     * @param string $apiToken
     * @return RequestInterface
     */
    public function setAuthorizationBearer(string $apiToken): RequestInterface;
}
