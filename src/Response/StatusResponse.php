<?php

namespace IdeaSpot\DekoPayApi\Response;

use IdeaSpot\DekoPayApi\Core\ResponseTrait;

class StatusResponse
{
    use ResponseTrait;

    private $creditApplicationId;
    private $decision;

    const STATUS_DECLINE= 'DECLINE';
    const STATUS_ACCEPT = 'ACCEPT';
    const STATUS_REFER = 'REFER';
    const STATUS_CANCEL = 'CANCEL';
    const STATUS_FULFILLED = 'FULFILLED';
    const STATUS_SUBMITTED = 'SUBMITTED';
    const STATUS_VERIFIED = 'VERIFIED';

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