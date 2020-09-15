<?php
namespace Teleconcept\Ivr\Client\Request;

use GuzzleHttp\Psr7\Request as Psr7Request;
use Teleconcept\Ivr\Client\ClientInterface as IvrClient;
use function array_key_exists;
use function is_int;

/**
 * Class Request
 * @package Teleconcept\Ivr\Client\Request
 */
abstract class Request extends Psr7Request implements RequestInterface
{
    /**
     * @var IvrClient
     */
    protected $client;

    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var array
     */
    protected $headers = [
        'Content-Type' => 'application/json'
    ];

    /**
     * @param string $apiToken
     * @param int $outletId
     * @return RequestInterface
     */
    final public function setAuthorization(string $apiToken, int $outletId): RequestInterface
    {
        $this->headers['Authorization'] = 'Bearer ' . $apiToken;
        $this->headers['Outlet'] = $outletId;

        return $this;
    }

    /**
     * @param string $option
     * @param mixed $value
     * @return RequestInterface
     */
    final public function setOption(string $option, $value): RequestInterface
    {
        if (!array_key_exists($option, $this->options) || $this->options[$option] !== $value) {
            $this->options[$option] = $value;
        }

        return $this;
    }

    /**
     * @return array
     */
    final public function validateHeaders(): array
    {
        $headers = $this->headers;
        $errors = [];

        if ($headers['Authorization'] === null) {
            $errors['apiKey'] = 'was not set.';
        }

        if (!isset($headers['Outlet'])) {
            $errors['Outlet'] = 'was not set.';
        } elseif (!is_int($headers['Outlet'])) {
            $errors['Outlet'] = 'has to be an integer.';
        } elseif ($headers['Outlet'] < 1) {
            $errors['Outlet'] = 'has to be equal or greater than 1.';
        }

        return $errors;
    }
}
