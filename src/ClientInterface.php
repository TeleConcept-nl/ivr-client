<?php
namespace Teleconcept\Ivr\Client;

use GuzzleHttp\Exception\GuzzleException;
use Teleconcept\Ivr\Client\Request\PerCall\CheckRequestInterface as CheckPerCallRequest;
use Teleconcept\Ivr\Client\Request\PerCall\CreateRequestInterface as CreatePerCallRequest;
use Teleconcept\Ivr\Client\Request\PerMinute\CheckRequestInterface as CheckPerMinuteRequest;
use Teleconcept\Ivr\Client\Request\PerMinute\CreateRequestInterface as CreatePerMinuteRequest;
use Teleconcept\Ivr\Client\Request\PerUsage\CheckRequestInterface as CheckPerUsageRequest;
use Teleconcept\Ivr\Client\Request\PerUsage\CreateRequestInterface as CreatePerUsageRequest;
use Teleconcept\Ivr\Client\Response\ResponseInterface as Response;

/**
 * Interface ClientInterface
 * @package Teleconcept\Ivr\Client
 */
interface ClientInterface extends \GuzzleHttp\ClientInterface
{
    /**
     * @param CreatePerCallRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function createPerCall(CreatePerCallRequest $request): Response;

    /**
     * @param CheckPerCallRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function checkPerCall(CheckPerCallRequest $request): Response;

    /**
     * @param CreatePerMinuteRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function createPerMinute(CreatePerMinuteRequest $request): Response;

    /**
     * @param CheckPerMinuteRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function checkPerMinute(CheckPerMinuteRequest $request): Response;

    /**
     * @param CreatePerUsageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function createPerUsage(CreatePerUsageRequest $request): Response;

    /**
     * @param CheckPerUsageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    public function checkPerUsage(CheckPerUsageRequest $request): Response;
}
