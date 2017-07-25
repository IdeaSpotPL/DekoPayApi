<?php

namespace IdeaSpot\DekoPayApi\Core;

trait RequestTrait
{
    private $parameters;

    public function __construct()
    {
        $this->parameters = array();
    }

    public function addParameter($name, $value)
    {
        if ($value) {
            $this->parameters[$name] = $value;
        }
    }
}