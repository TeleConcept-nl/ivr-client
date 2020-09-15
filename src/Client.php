<?php
namespace Teleconcept\Ivr\Client;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Teleconcept\Ivr\Client\Request\PerCall\CheckRequestInterface as CheckPerCallRequest;
use Teleconcept\Ivr\Client\Request\PerCall\CreateRequestInterface as CreatePerCallRequest;
use Teleconcept\Ivr\Client\Request\PerMinute\CheckRequestInterface as CheckPerMinuteRequest;
use Teleconcept\Ivr\Client\Request\PerMinute\CreateRequestInterface as CreatePerMinuteRequest;
use Teleconcept\Ivr\Client\Request\PerUsage\CheckRequestInterface as CheckPerUsageRequest;
use Teleconcept\Ivr\Client\Request\PerUsage\CreateRequestInterface as CreatePerUsageRequest;
use Teleconcept\Ivr\Client\Request\Pincode\ConsumeRequestInterface as ConsumePincodeRequest;
use Teleconcept\Ivr\Client\Response\Error\BadRequestResponse;
use Teleconcept\Ivr\Client\Response\Error\NotFoundResponse;
use Teleconcept\Ivr\Client\Response\Error\PreconditionFailedResponse;
use Teleconcept\Ivr\Client\Response\Error\UnauthorizedResponse;
use Teleconcept\Ivr\Client\Response\PerCall\CreateResponse as CreatePerCallResponse;
use Teleconcept\Ivr\Client\Response\PerCall\CheckResponse as CheckPerCallResponse;
use Teleconcept\Ivr\Client\Response\PerMinute\CreateResponse as CreatePerMinuteResponse;
use Teleconcept\Ivr\Client\Response\PerMinute\CheckResponse as CheckPerMinuteResponse;
use Teleconcept\Ivr\Client\Response\PerUsage\CreateResponse as CreatePerUsageResponse;
use Teleconcept\Ivr\Client\Response\PerUsage\CheckResponse as CheckPerUsageResponse;
use Teleconcept\Ivr\Client\Response\Pincode\ConsumeResponse as ConsumePincodeResponse;
use Teleconcept\Ivr\Client\Response\ResponseInterface as Response;

/**
 * Class Client
 * @package Teleconcept\Ivr\Client
 */
class Client extends GuzzleClient implements ClientInterface
{
    /**
     * Client constructor.
     * @param $ivrApiDomain
     */
    public function __construct(string $ivrApiDomain)
    {
        parent::__construct(['base_uri' => $ivrApiDomain]);
    }

    /**
     * @param CreatePerCallRequest $request
     * @return Response
     * @throws GuzzleException
     */
    final public function createPerCall(CreatePerCallRequest $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new CreatePerCallResponse($response);
    }

    /**
     * @param CheckPerCallRequest $request
     * @return Response
     * @throws GuzzleException
     */
    final public function checkPerCall(CheckPerCallRequest $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new CheckPerCallResponse($response);
    }

    /**
     * @param CreatePerMinuteRequest $request
     * @return Response
     * @throws GuzzleException
     */
    final public function createPerMinute(CreatePerMinuteRequest $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new CreatePerMinuteResponse($response);
    }

    /**
     * @param CheckPerMinuteRequest $request
     * @return Response
     * @throws GuzzleException
     */
    final public function checkPerMinute(CheckPerMinuteRequest $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new CheckPerMinuteResponse($response);
    }


    /**
     * @param CreatePerUsageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    final public function createPerUsage(CreatePerUsageRequest $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new CreatePerUsageResponse($response);
    }

    /**
     * @param CheckPerUsageRequest $request
     * @return Response
     * @throws GuzzleException
     */
    final public function checkPerUsage(CheckPerUsageRequest $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new CheckPerUsageResponse($response);
    }

    /**
     * @param ConsumePincodeRequest $request
     * @return Response
     * @throws GuzzleException
     */
    final public function consumePincode(ConsumePincodeRequest $request): Response
    {
        try {
            $response = $this->send($request);
        } catch (ClientException $exception) {
            return $this->processClientException($exception);
        }

        return new ConsumePincodeResponse($response);
    }

    /**
     * @param ClientException $exception
     * @return Response
     * @throws GuzzleException
     */
    private function processClientException(ClientException $exception): Response
    {
        $errorResponse = $exception->getResponse();

        if ($errorResponse && $errorResponse->getStatusCode() === 400) {
            return new BadRequestResponse($errorResponse);
        }
        if ($errorResponse && $errorResponse->getStatusCode() === 401) {
            return new UnauthorizedResponse($errorResponse);
        }
        if ($errorResponse && $errorResponse->getStatusCode() === 404) {
            return new NotFoundResponse($errorResponse);
        }
        if ($errorResponse && $errorResponse->getStatusCode() === 412) {
            return new PreconditionFailedResponse($errorResponse);
        }

        throw $exception;
    }
}
