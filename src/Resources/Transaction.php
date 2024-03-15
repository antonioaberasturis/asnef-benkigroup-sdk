<?php

namespace Asnef\Benkigroup\Resources;

class Transaction
{
    use ResourceParser;

    /** @var WorstSituation */
    public $worstSituation;

    /** @var Operation[] */
    public $operations;

    /** @var MonthlyInformation[] */
    public $monthlyInformations;

    /** @var Validations[] */
    public $validations;

    public $id;
    public $worstSituationId;
    public $customerId;
    public $leadId;
    public $online;
    public $personalid;
    public $personalidHash;
    public $hasData;
    public $personName;
    public $originalCreatedAt;
    public $lastUpdatedAt;
    public $operationCount;
    public $totalOperationAmount;
    public $operationUnpaidCount;
    public $paymentUnpaidCount;
    public $totalPaymentUnpaidAmount;
    public $maximunPaymentUnpaidAmount;
    public $maximunPaymentUnpaidAt;
    public $worstSituationAt;
    public $transactionid;
    public $interactionid;
    public $timestamp;
    public $invalid;
    public $createdAt;
    public $updatedAt;

    public $asnef;

    public function __construct(array $attributes, $asnef = null)
    {
        $this->asnef = $asnef;
        $this->fill($attributes);

        if (isset($attributes['worst_situation']) && $attributes['worst_situation']) {
            $this->worstSituation = new WorstSituation($attributes['worst_situation'], $asnef);
        }

        if (isset($attributes['operations']) && $attributes['operations']) {
            $this->operations = array_map(function (array $operationAttributes) use ($asnef) {
                return new Operation($operationAttributes, $asnef);
            }, $attributes['operations']);
        }

        if (isset($attributes['monthly_informations']) && $attributes['monthly_informations']) {
            $this->monthlyInformations = array_map(function (array $monthlyInformationAttributes) use ($asnef) {
                return new MonthlyInformation($monthlyInformationAttributes, $asnef);
            }, $attributes['monthly_informations']);
        }

        if (isset($attributes['validations']) && $attributes['validations']) {
            $this->validations = array_map(function (array $validationAttributes) use ($asnef) {
                return new Validation($validationAttributes, $asnef);
            }, $attributes['validations']);
        }
    }

    public function operations(): array
    {
        if ($this->operations) {
            return $this->operations;
        }

        return $this->asnef->consultOperations($this->id);
    }

    public function monthlyInformations(): array
    {
        if ($this->monthlyInformations) {
            return $this->monthlyInformations;
        }

        return $this->asnef->consultMonthlyInformations($this->id);
    }

    public function validations(): array
    {
        if ($this->validations) {
            return $this->validations;
        }

        return $this->asnef->consultValidations($this->id);
    }

    public function hasData()
    {
        return $this->hasData;
    }

    public function online()
    {
        return $this->online;
    }

    public function invalid()
    {
        return $this->invalid;
    }

    public function valid()
    {
        return !$this->invalid;
    }
}
