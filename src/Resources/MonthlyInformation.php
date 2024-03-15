<?php

namespace Asnef\Benkigroup\Resources;

class MonthlyInformation
{
    use ResourceParser;

    /** @var WorstSituation */
    public $worstSituation;

    public $id;
    public $transactionId;
    public $worstSituationId;
    public $customerId;
    public $leadId;
    public $date;
    public $operationCount;
    public $totalOperationAmount;
    public $operationUnpaidCount;
    public $paymentUnpaidCount;
    public $totalPaymentUnpaidAmount;
    public $invalid;
    public $createdAt;
    public $updatedAt;

    public function __construct(array $attributes, $asnef = null)
    {
        $this->fill($attributes);

        if (isset($attributes['worst_situation']) && $attributes['worst_situation']) {
            $this->worstSituation = new WorstSituation($attributes['worst_situation'], $asnef);
        }
    }

    public function worstSituation()
    {
        return $this->worstSituation;
    }
}
