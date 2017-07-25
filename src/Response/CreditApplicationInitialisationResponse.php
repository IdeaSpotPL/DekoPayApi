<?php

namespace IdeaSpot\DekoPayApi\Response;

use IdeaSpot\DekoPayApi\Core\ResponseTrait;

class CreditApplicationInitialisationResponse
{
    use ResponseTrait;

    private $retailerUniqueRef;

    public function __construct($response)
    {
        $data = $this->xmlResponseToArray($response);

        $this->retailerUniqueRef = $data['result'];
    }

    public function getRetailerUniqueRef()
    {
        return $this->retailerUniqueRef;
    }
}