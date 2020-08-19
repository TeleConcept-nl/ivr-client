<?php
namespace Teleconcept\Packages\Transaction\Client\Request\Check;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use Teleconcept\Packages\Transaction\Client\ClientInterface as TransactionClient;
use Teleconcept\Packages\Transaction\Client\Request\Check\CheckPaymentInterface as CheckPaymentRequest;
use Teleconcept\Packages\Transaction\Client\Response\CheckTransaction;
use Teleconcept\Packages\Transaction\Client\Response\CheckTransactionInterface as CheckTransactionResponse;

/**
 * Class CheckTransaction
 * @package Teleconcept\Packages\Transaction\Client\Request
 */
abstract class CheckPayment extends Request implements CheckPaymentRequest
{
    /**
     * @var int
     */
    private $transactionId;

    /**
     * @var string
     */
    private $path;

    /**
     * @var array
     */
    private $headers = [
        'Content-Type' => 'application/json'
    ];

    /**
     * @var TransactionClient
     */
    private $client;

    /**
     * CheckPayment constructor.
     * @param string $path
     * @param TransactionClient $client
     */
    public function __construct(string $path, TransactionClient $client)
    {
        parent::__construct('GET', '');
        $this->path = $path;
        $this->client = $client;
    }

    /**
     * @param string $bearer
     * @return $this|CheckPaymentRequest
     */
    final public function setAuthorizationBearer(string $bearer): CheckPaymentRequest
    {
        $this->headers['Authorization'] = 'Bearer ' . $bearer;
        return $this;
    }

    /**
     * @param int $transactionId
     * @return CheckPaymentInterface
     */
    final public function setTransactionId(int $transactionId): CheckPaymentRequest
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    /**
     * @return CheckTransactionResponse
     * @throws GuzzleException
     */
    final public function send(): CheckTransactionResponse
    {
        $uri = new Uri(sprintf($this->path, $this->transactionId));
        $this->withUri($uri);

        foreach ($this->headers as $header => $value) {
            $request = $request->withAddedHeader($header, $value);
        }

        $response = $this->client->checkPayment($request);

        return new CheckTransaction($response);
    }
}
