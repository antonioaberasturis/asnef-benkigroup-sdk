<?php

namespace Asnef\Benkigroup\Resources;

class Operation
{
    use ResourceParser;

    /** @var Situation */
    public $situation;

    /** @var Nature */
    public $nature;

    /** @var Product */
    public $product;

    /** @var Entity */
    public $entity;

    public $id;
    public $transactionId;
    public $productId;
    public $natureId;
    public $situationId;
    public $entityId;
    public $customerId;
    public $leadId;
    public $operationCode;
    public $originalCreatedAt;
    public $totalOperationAmount;
    public $operationStartAt;
    public $operationEndAt;
    public $paymentCount;
    public $totalAmount;
    public $totalAllPaymentAmount;
    public $paymentUnpaidCount;
    public $totalPaymentUnpaidAmount;
    public $totalBalanceOutstanding;
    public $firstPaymentDueUnpaidAt;
    public $lastPaymentDueUnpaidAt;
    public $invalid;
    public $createdAt;
    public $updatedAt;

    public function __construct(array $attributes, $asnef = null)
    {
        $this->fill($attributes);

        if (isset($attributes['situation']) && $attributes['situation']) {
            $this->situation = new Situation($attributes['situation'], $asnef);
        }

        if (isset($attributes['product']) && $attributes['product']) {
            $this->product = new Product($attributes['product'], $asnef);
        }

        if (isset($attributes['nature']) && $attributes['nature']) {
            $this->nature = new Nature($attributes['nature'], $asnef);
        }

        if (isset($attributes['entity']) && $attributes['entity']) {
            $this->entity = new Entity($attributes['entity'], $asnef);
        }
    }

    public function nature()
    {
        return $this->nature;
    }

    public function situation()
    {
        return $this->situation;
    }

    public function entity()
    {
        return $this->entity;
    }

    public function product()
    {
        return $this->product;
    }
}
