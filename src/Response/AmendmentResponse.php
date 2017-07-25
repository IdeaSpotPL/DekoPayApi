<?php

namespace IdeaSpot\DekoPayApi\Response;

use IdeaSpot\DekoPayApi\Core\ResponseTrait;

class AmendmentResponse
{
    use ResponseTrait;

    private $result;

    public function __construct($response)
    {
        $data = $this->xmlResponseToArray($response);

        $this->result = $data['result'];
    }

    /**
     * @return bool
     */
    public function getResult()
    {
        return ($this->result === 'success');
    }
}