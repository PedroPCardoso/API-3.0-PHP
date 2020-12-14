<?php

namespace Cielo\API30\Ecommerce;
use stdClass;

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

    private $browser;

    private $cart;

    private $status;

    private $replayData;

    private $merchantDefinedFields;
    /**
     * Customer constructor.
     *
     * @param null $name
     */
    public function __construct($Sequence = null,$SequenceCriteria=null, $Provider=null,$TotalOrderAmount,$CaptureOnLowRisk= false,$VoidOnHighRisk= false)
    {
        $this->setSequence($Sequence);
        $this->setSequenceCriteria($SequenceCriteria);
        $this->setProvider($Provider);
        $this->setTotalOrderAmount($TotalOrderAmount);
        $this->setCaptureOnLowRisk($CaptureOnLowRisk);
        $this->setVoidOnHighRisk($VoidOnHighRisk);
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
        $this->TotalOrderAmount = isset($data->TotalOrderAmount) ? $data->TotalOrderAmount : null;

        $this->CaptureOnLowRisk     = isset($data->CaptureOnLowRisk) ? $data->CaptureOnLowRisk : false;
        $this->VoidOnHighRisk = isset($data->VoidOnHighRisk) ? $data->VoidOnHighRisk : false;
       
        $this->status  = isset($data->status) ? $data->status : null;
        $this->replayData  = isset($data->replayData) ? $data->replayData : null;

      
    }


    /**
     * @return mixed
     */
    public function getSequence()
    {
        return $this->Sequence;
    }

    /**
     * @param $Sequence
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
     * @param $SequenceCriteria
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
     * @param $Provider
     *
     * @return $this
     */
    public function setProvider($Provider)
    {
        $this->Provider = $Provider;

        return $this;
    }

    /**
     * @param $data
     *
     * @return $this
     */
    public function setBrowser(array $data = []){

        $browserData = new stdClass();
        $browserData->browserFingerprint = $data['fingerprint'] ?? null;
        $browserData->cookiesAccepted    = $data['cookies']     ?? null;
        $browserData->email              = $data['email']       ?? null;
        $browserData->hostName           = $data['hostname']    ?? null;
        $browserData->ipAddress          = $data['ip']          ?? null;
        $browserData->type               = $data['type']        ?? null;
 
        $this->browser = $browserData;
        return $this;
    }


    public function setCart(array $data = []){

        $cartData = new stdClass();
        $cartData->browserFingerprint = $data['fingerprint'] ?? null;
        $cartData->cookiesAccepted    = $data['cookies']     ?? null;
        $cartData->email              = $data['email']       ?? null;
        $cartData->hostName           = $data['hostname']    ?? null;
        $cartData->ipAddress          = $data['ip']          ?? null;
        $cartData->type               = $data['type']        ?? null;
        $cartData->items = null;

        $items = new stdClass();
        $items->name = $data['name']  ?? null;	
        $items->quantity =  $data['quantity']  ??  1;	
        $items->sku = $data['sku']  ?? null;	
        // Preço unitário UnitPrice
        $items->unitprice = $data['unitprice']  ?? null;	


        $this->cart = $cartData;
        $this->cart->items =array($items);
        
        return $this;
    }

    public function setMerchantDefinedFields(array $data = []){
        // $MerchantData = new stdClass();
        $this->merchantDefinedFields = $data;
    }


     /**
     * @return mixed
     */
    public function getMerchantDefinedFields(){

        return $this->merchantDefinedFields;
    }
   


     /**
     * @return mixed
     */
    public function getCart(){

        return $this->cart;
    }
    

     /**
     * @return mixed
     */
    public function getBrowse()
    {
        return $this->browser;
    }



     /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

         /**
     * @return mixed
     */
    public function getReplayData()
    {
        return $this->replayData;
    }


             /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->replayData->Score;
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
