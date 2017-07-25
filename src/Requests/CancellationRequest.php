<?php
namespace IdeaSpot\DekoPayApi\Requests;

use IdeaSpot\DekoPayApi\Core\RequestTrait;
use IdeaSpot\DekoPayApi\Core\RequestInterface;

class CancellationRequest implements RequestInterface
{
    use RequestTrait;

    const NEW_STATE = 'cancelled';

    /** @var int
     * The Deko ID for this credit application which you want to amend.
     */
    private $creditApplicationId;

    /** @var string
     * The reason why the credit application is being cancelled
     */
    private $cancellationNote;

    public function getParameters()
    {
        $this->addParameter('new_state', self::NEW_STATE);
        $this->addParameter('cr_id', $this->getCreditApplicationId());
        $this->addParameter('cancellation_note', $this->getCancellationNote());

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
    public function getCancellationNote()
    {
        return $this->cancellationNote;
    }

    /**
     * @param string $cancellationNote
     */
    public function setCancellationNote($cancellationNote)
    {
        $this->cancellationNote = $cancellationNote;
    }
}