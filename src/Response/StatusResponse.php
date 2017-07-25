<?php

namespace IdeaSpot\DekoPayApi\Response;

use IdeaSpot\DekoPayApi\Core\ResponseTrait;

class StatusResponse
{
    use ResponseTrait;

    private $creditApplicationId;
    private $decision;

    public function __construct($response)
    {
        $data = $this->xmlResponseToArray($response);

        $this->creditApplicationId = (int) $data['cr_id'];
        $this->decision = $data['decision'];
    }

    /**
     * @return int
     */
    public function getCreditApplicationId()
    {
        return $this->creditApplicationId;
    }

    /**
     * @return string
     */
    public function getDecision()
    {
        return $this->decision;
    }
}