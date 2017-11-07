<?php

namespace Platron\Connectum\services\operation_list;

use DateTime;
use Platron\Connectum\handbooks\OperationStatus;
use Platron\Connectum\SdkException;
use Platron\Connectum\services\BaseGetRequest;

class OperationListRequest extends BaseGetRequest {
    
    /** @var array */
    protected $expands;
    /** @var string */
    protected $status;
    /** @var string */
    protected $created_from;
    /** @var string */
    protected $created_to;
    /** @var array */
    protected $types;
    
    /**
     * {@inheritdoc}
     */
    public function getRequestUrl() {
        return '/operations/';
    }

    /**
     * Set expands
     * @param array $expands
     * @return $this
     */
    public function setExpands($expands) {
        $this->expands = $expands;
        return $this;
    }
    
    /**
     * Set status
     * @param string $status
     * @return $this
     */
    public function setStatus($status) {
        if(!in_array($status, OperationStatus::getAllStatuses())){
            throw new SdkException('Wrong status. Use from constants');
        }
        
        $this->status = $status;
        return $this;
    }
    
    /**
     * Set created from
     * @param DateTime $dateFrom
     * @return $this
     */
    public function setCreatedFrom(DateTime $dateFrom){
        $this->created_from = $dateFrom->format('Y-m-d H:i:s');
        return $this;
    }
    
    /**
     * Set created to
     * @param DateTime $dateTo
     * @return $this
     */
    public function setCreatedTo(DateTime $dateTo){
        $this->created_to = $dateTo->format('Y-m-d H:i:s');
        return $this;
    }
    
    /**
     * Set types filter
     * @param string $type
     * @return $this
     */
    public function setType($type){
        $this->type = $type;
        return $this;
    }
}
