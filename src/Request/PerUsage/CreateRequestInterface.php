<?php
namespace Teleconcept\Ivr\Client\Request\PerUsage;

use Teleconcept\Ivr\Client\Request\RequestInterface;

/**
 * Interface CreatePerCallPayment
 * @package Teleconcept\Ivr\Client\Request
 */
interface CreateRequestInterface extends RequestInterface
{
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
