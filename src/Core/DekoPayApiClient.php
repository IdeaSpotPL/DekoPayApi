<?php

namespace IdeaSpot\DekoPayApi\Core;

use IdeaSpot\DekoPayApi\Requests\CreditApplicationInitialisationRequest;
use IdeaSpot\DekoPayApi\Requests\CreditApplicationResumeLinkRequest;
use IdeaSpot\DekoPayApi\Requests\StatusRequest;
use IdeaSpot\DekoPayApi\Response\CreditApplicationInitialisationResponse;
use IdeaSpot\DekoPayApi\Response\CreditApplicationResumeLinkResponse;
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