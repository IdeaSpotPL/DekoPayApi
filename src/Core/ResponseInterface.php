<?php

namespace IdeaSpot\DekoPayApi\Core;

interface ResponseInterface
{
    /**
     * @param string $response
     * @return array
     */
    public function xmlResponseToArray($response);
}