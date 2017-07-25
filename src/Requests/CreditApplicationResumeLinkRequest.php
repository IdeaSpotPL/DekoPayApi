<?php

namespace IdeaSpot\DekoPayApi\Requests;

use IdeaSpot\DekoPayApi\Core\RequestTrait;
use IdeaSpot\DekoPayApi\Core\RequestInterface;

class CreditApplicationResumeLinkRequest implements RequestInterface
{
    use RequestTrait;

    const ACTION = 'credit_application_resume_link';

    /** @var int */
    private $creditApplicationId;

    /** @var string */
    private $identificationInstallationId;

    public function getParameters()
    {
        $this->addParameter('action', self::ACTION);
        $this->addParameter('cr_id', $this->getCreditApplicationId());
        $this->addParameter('Identification[InstallationID]', $this->getIdentificationInstallationId());

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
    public function getIdentificationInstallationId()
    {
        return $this->identificationInstallationId;
    }

    /**
     * @param string $identificationInstallationId
     */
    public function setIdentificationInstallationId($identificationInstallationId)
    {
        $this->identificationInstallationId = $identificationInstallationId;
    }
}