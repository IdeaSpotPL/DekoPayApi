<?php
namespace IdeaSpot\DekoPayApi\Requests;

use IdeaSpot\DekoPayApi\Core\RequestTrait;
use IdeaSpot\DekoPayApi\Core\RequestInterface;

class ResendCsnRequest implements RequestInterface
{
    use RequestTrait;

    const ACTION = 'resend_csn';

    /** @var int
     * The Deko ID for this credit application which you want to amend.
     */
    private $creditApplicationId;

    public function getParameters()
    {
        $this->addParameter('action', self::ACTION);
        $this->addParameter('cr_id', $this->getCreditApplicationId());

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
}