<?php
namespace IdeaSpot\DekoPayApi\Requests;

use IdeaSpot\DekoPayApi\Core\RequestTrait;
use IdeaSpot\DekoPayApi\Core\RequestInterface;

class FulfilmentRequest implements RequestInterface
{
    use RequestTrait;

    const NEW_STATE = 'fulfilled';

    /** @var int
     * The Deko ID for this credit application which you want to amend.
     */
    private $creditApplicationId;

    /** @var string
     * A reference for fulfilment
     */
    private $fulfilmentReference;

    public function getParameters()
    {
        $this->addParameter('new_state', self::NEW_STATE);
        $this->addParameter('cr_id', $this->getCreditApplicationId());
        $this->addParameter('fulfilment_ref', $this->getFulfilmentReference());

        return $this->parameters;
    }

    /**
     * @return int
     */
    public function getCreditApplicationId()
    {
        return $this->creditApplicationId;
    }

    /**
     * @param int $creditApplicationId
     */
    public function setCreditApplicationId($creditApplicationId)
    {
        $this->creditApplicationId = $creditApplicationId;
    }

    /**
     * @return string
     */
    public function getFulfilmentReference()
    {
        return $this->fulfilmentReference;
    }

    /**
     * @param string $fulfilmentReference
     */
    public function setFulfilmentReference($fulfilmentReference)
    {
        $this->fulfilmentReference = $fulfilmentReference;
    }
}