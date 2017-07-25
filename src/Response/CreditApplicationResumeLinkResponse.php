<?php

namespace IdeaSpot\DekoPayApi\Response;

use IdeaSpot\DekoPayApi\Core\ResponseTrait;

class CreditApplicationResumeLinkResponse
{
    use ResponseTrait;

    private $resumeLink;

    public function __construct($response)
    {
        $data = $this->xmlResponseToArray($response);

        $this->resumeLink = $data['result'];
    }

    public function getResumeLink()
    {
        return $this->resumeLink;
    }
}