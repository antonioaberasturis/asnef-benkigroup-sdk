<?php

namespace Asnef\Benkigroup\Resources;

class Validation
{
    use ResourceParser;

    public $id;
    public $transactionId;
    public $customerId;
    public $leadId;
    public $value;
    public $valueMatched;
    public $createdAt;
    public $updatedAt;

    public function __construct(array $attributes, $asnef = null)
    {
        $this->fill($attributes);
    }
}
