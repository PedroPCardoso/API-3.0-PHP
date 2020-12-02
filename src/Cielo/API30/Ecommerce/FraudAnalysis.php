<?php

namespace Cielo\API30\Ecommerce;

/**
 * Class Customer
 *
 * @package Cielo\API30\Ecommerce
 */
class FraudAnalysis implements \JsonSerializable
{

    private $Sequence;

    private $SequenceCriteria;

    private $Provider;

    private $CaptureOnLowRisk;

    private $VoidOnHighRisk;

    private $TotalOrderAmount;

    /**
     * Customer constructor.
     *
     * @param null $name
     */
    public function __construct($Sequence = null)
    {
        $this->setName($Sequence);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $this->Sequence      = isset($data->Sequence) ? $data->Sequence : null;
        $this->SequenceCriteria     = isset($data->SequenceCriteria) ? $data->SequenceCriteria : null;
        $this->Provider = isset($data->Provider) ? $data->Provider : null;

        $this->CaptureOnLowRisk     = isset($data->CaptureOnLowRisk) ? $data->CaptureOnLowRisk : null;
        $this->VoidOnHighRisk = isset($data->VoidOnHighRisk) ? $data->VoidOnHighRisk : null;

        $this->TotalOrderAmount = isset($data->TotalOrderAmount) ? $data->TotalOrderAmount : null;
    }


    /**
     * @return mixed
     */
    public function getSequence()
    {
        return $this->Sequence;
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setSequence($Sequence)
    {
        $this->Sequence = $Sequence;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSequenceCriteria()
    {
        return $this->SequenceCriteria;
    }

    /**
     * @param $email
     *
     * @return $this
     */
    public function setSequenceCriteria($SequenceCriteria)
    {
        $this->SequenceCriteria = $SequenceCriteria;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->Provider;
    }

    /**
     * @param $birthDate
     *
     * @return $this
     */
    public function setProvider($Provider)
    {
        $this->Provider = $Provider;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCaptureOnLowRisk()
    {
        return $this->CaptureOnLowRisk;
    }

    /**
     * @param $identity
     *
     * @return $this
     */
    public function setCaptureOnLowRisk($CaptureOnLowRisk)
    {
        $this->CaptureOnLowRisk = $CaptureOnLowRisk;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVoidOnHighRisk()
    {
        return $this->VoidOnHighRisk;
    }

    /**
     * @param $identityType
     *
     * @return $this
     */
    public function setVoidOnHighRisk($VoidOnHighRisk)
    {
        $this->VoidOnHighRisk = $VoidOnHighRisk;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalOrderAmount()
    {
        return $this->TotalOrderAmount;
    }

    /**
     * @param $address
     *
     * @return $this
     */
    public function setTotalOrderAmount($TotalOrderAmount)
    {
        $this->TotalOrderAmount = $TotalOrderAmount;

        return $this;
    }

}
