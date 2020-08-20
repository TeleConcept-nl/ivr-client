<?php
namespace Teleconcept\Packages\Transaction\Ivr\Client\Request\Create;

use BadMethodCallException;
use Teleconcept\Packages\Transaction\Ivr\Client\Request\Create\CreatePaymentInterface as CreatePaymentRequest;
use Teleconcept\Packages\Transaction\Ivr\Client\Response\CreatePaymentInterface as CreateTransactionResponse;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\RequestInterface;

/**
 * Interface TransactionRequest
 * @package Teleconcept\Packages\Transaction\Ivr\Client\Request
 */
interface CreatePaymentInterface extends RequestInterface
{
    /**
     * @param int $outletId
     * @return $this
     */
    public function setOutletId(int $outletId): self;

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry(string $country): self;

    /**
     * @param string $reportUrl
     * @return $this
     */
    public function setReportUrl(string $reportUrl): self;

    /**
     * @param string $tariff
     * @return $this
     */
    public function setTariff(string $tariff): self;

    /**
     * @param string $tariff
     * @return $this
     */
    public function setIpAddress(string $tariff): self;

    /**
     * @param bool $adult
     * @return $this
     */
    public function setAdult(bool $adult): self;

    /**
     * @param string $bearer
     * @return $this
     */
    public function setAuthorizationBearer(string $bearer): self;

    /**
     * @return bool
     */
    public function validate(): bool;

    /**
     * @return CreateTransactionResponse
     * @throws GuzzleException
     * @throws BadMethodCallException
     */
    public function send(): CreateTransactionResponse;

    /**
     * @param string $option
     * @param $value
     * @return CreatePaymentInterface
     */
    public function setOption(string $option, $value): CreatePaymentRequest;
}
