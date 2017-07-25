<?php

namespace IdeaSpot\DekoPayApi\Core;

use IdeaSpot\DekoPayApi\Requests\AmendmentRequest;
use IdeaSpot\DekoPayApi\Requests\CancellationRequest;
use IdeaSpot\DekoPayApi\Requests\CreditApplicationInitialisationRequest;
use IdeaSpot\DekoPayApi\Requests\CreditApplicationResumeLinkRequest;
use IdeaSpot\DekoPayApi\Requests\FulfilmentRequest;
use IdeaSpot\DekoPayApi\Requests\ResendCsnRequest;
use IdeaSpot\DekoPayApi\Requests\StatusRequest;
use IdeaSpot\DekoPayApi\Response\AmendmentResponse;
use IdeaSpot\DekoPayApi\Response\CancellationResponse;
use IdeaSpot\DekoPayApi\Response\CreditApplicationInitialisationResponse;
use IdeaSpot\DekoPayApi\Response\CreditApplicationResumeLinkResponse;
use IdeaSpot\DekoPayApi\Response\FulfilmentResponse;
use IdeaSpot\DekoPayApi\Response\ResendCsnResponse;
use IdeaSpot\DekoPayApi\Response\StatusResponse;

class DekoPayApiClient
{
    private $interface, $apiKey;

    public function __construct($interface, $apiKey)
    {
        $this->interface = $interface;
        $this->apiKey = $apiKey;
    }

    /**
     * @param CreditApplicationInitialisationRequest $request
     * @return CreditApplicationInitialisationResponse $response
     * @throws \Exception
     */
    public function creditApplicationInitialisation(CreditApplicationInitialisationRequest $request)
    {
        return new CreditApplicationInitialisationResponse($this->createRequest($request));
    }

    /**
     * @param StatusRequest $request
     * @return StatusResponse $response
     * @throws \Exception
     */
    public function status(StatusRequest $request)
    {
        return new StatusResponse($this->createRequest($request));
    }

    /**
     * @param CreditApplicationResumeLinkRequest $request
     * @return CreditApplicationResumeLinkResponse $response
     * @throws \Exception
     */
    public function creditApplicationResumeLink(CreditApplicationResumeLinkRequest $request)
    {
        return new CreditApplicationResumeLinkResponse($this->createRequest($request));
    }

    /**
     * @param FulfilmentRequest $request
     * @return FulfilmentResponse $response
     * @throws \Exception
     */
    public function fullFillApplication(FulfilmentRequest $request)
    {
        return new FulfilmentResponse($this->createRequest($request));
    }

    /**
     * @param ResendCsnRequest $request
     * @return ResendCsnResponse $response
     * @throws \Exception
     */
    public function resendCsn(ResendCsnRequest $request)
    {
        return new ResendCsnResponse($this->createRequest($request));
    }

    /**
     * @param CancellationRequest $request
     * @return CancellationResponse $response
     * @throws \Exception
     */
    public function cancellation(CancellationRequest $request)
    {
        return new CancellationResponse($this->createRequest($request));
    }

    /**
     * @param AmendmentRequest $request
     * @return AmendmentResponse $response
     * @throws \Exception
     */
    public function amendment(AmendmentRequest $request)
    {
        return new AmendmentResponse($this->createRequest($request));
    }

    private function createRequest(RequestInterface $request)
    {
        $parameters = $request->getParameters();
        $parameters['Identification[api_key]'] = $this->apiKey;
        $parameters['api_key'] = $this->apiKey;

        $sender = new Sender($this->interface, $parameters);
        $sender->request();

        if ($sender->isFailed()) {
            throw new \Exception($sender->getError(), $sender->getErrorCode());
        }

        return $sender->getResponse();
    }
}