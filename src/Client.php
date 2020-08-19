<?php
namespace Teleconcept\Packages\Transaction\Client;

use Teleconcept\Packages\Transaction\Client\Request\Check\CheckPaymentInterface as CheckPaymentRequest;
use Teleconcept\Packages\Transaction\Client\Request\Create\CreatePaymentInterface as CreatePaymentRequest;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class Client
 * @package Teleconcept\Packages\Transaction\Client
 */
class Client extends GuzzleClient implements ClientInterface
{
    /**
     * Client constructor.
     * @param $transactionClientDomain
     */
    public function __construct(string $transactionClientDomain)
    {
        parent::__construct(['base_uri' => $transactionClientDomain]);
    }

    /**
     * @param CreatePaymentRequest $createPaymentRequest
     * @return Response
     * @throws GuzzleException
     */
    final public function createPayment(CreatePaymentRequest $createPaymentRequest): Response
    {
        return $this->send($createPaymentRequest);
    }

    /**
     * @param CheckPaymentRequest $checkPaymentRequest
     * @return Response
     * @throws GuzzleException
     */
    final public function checkPayment(CheckPaymentRequest $checkPaymentRequest): Response
    {
        return $this->send($checkPaymentRequest);
    }
}
