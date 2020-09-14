<?php
namespace Teleconcept\Ivr\Client\Request\PerCall;

use Teleconcept\Ivr\Client\Request\Create\CreatePaymentInterface;
use Teleconcept\Ivr\Client\Request\RequestInterface as Request;

/**
 * Interface CreateRequestInterface
 * @package Teleconcept\Ivr\Client\Request\PerCall
 */
interface CreateRequestInterface extends Request
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
}
