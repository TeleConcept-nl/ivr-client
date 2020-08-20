<?php
namespace Teleconcept\Packages\Transaction\Ivr\Client;

use Teleconcept\Packages\Transaction\Ivr\Client\Request\Check\CheckPaymentInterface as CheckTransactionRequest;
use Teleconcept\Packages\Transaction\Ivr\Client\Request\Create\CreatePaymentInterface as CreateTransactionRequest;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Interface ClientInterface
 * @package Teleconcept\Packages\Transaction\Ivr\Client
 */
interface ClientInterface extends \GuzzleHttp\ClientInterface
{
    /**
     * @param CreateTransactionRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function createPayment(CreateTransactionRequest $request): Response;

    /**
     * @param CheckTransactionRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function checkPayment(CheckTransactionRequest $request): Response;
}
