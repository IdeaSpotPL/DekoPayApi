<?php
namespace IdeaSpot\DekoPayApi\Requests;

use IdeaSpot\DekoPayApi\Core\RequestTrait;
use IdeaSpot\DekoPayApi\Core\RequestInterface;

class StatusRequest implements RequestInterface
{
    use RequestTrait;

    /** @var string */
    private $retailerUniqueRef;

    const REQUEST_STATE = 'true';

    public function getParameters()
    {
        $this->addParameter('retaileruniqueref', $this->retailerUniqueRef);
        $this->addParameter('request_state', self::REQUEST_STATE);

        return $this->parameters;
    }

    /**
     * @return string
     */
    public function getRetailerUniqueRef()
    {
        return $this->retailerUniqueRef;
    }

    /**
     * @param string $retailerUniqueRef
     */
    public function setRetailerUniqueRef($retailerUniqueRef)
    {
        $this->retailerUniqueRef = $retailerUniqueRef;
    }
}