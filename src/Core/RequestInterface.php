<?php

namespace IdeaSpot\DekoPayApi\Core;

interface RequestInterface
{
    public function __construct();

    /**
     * @return array
     */
    public function getParameters();
}