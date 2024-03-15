<?php

namespace Asnef\Benkigroup\Resources;

class FileRecord
{
    use ResourceParser;

    public $id;
    public $file;
    public $status;
    public $customerId;
    public $contractId;
    public $filed;
    public $statusId;
    public $file_id;
    public $identifier;
    public $dateStart;
    public $dateEnd;
    public $amount;
    public $quotaCount;
    public $quotaAmount;
    public $amountPending;
    public $quotaUnpaidCount;
    public $quotaUnpaidDueDateStart;
    public $quotaUnpaidDueDateEnd;
    public $amountUnpaid;
    public $additionalInformation;
    public $personalid;
    public $socialReason;
    public $firstSurname;
    public $secondSurname;
    public $name;
    public $indicatorNotify;
    public $nationalityCountryCode;
    public $nationalOcupationCode;
    public $enterpriseActivitiesCode;
    public $streetType;
    public $street;
    public $streetNumber;
    public $streetAdditional;
    public $cityCode;
    public $city;
    public $provinceCode;
    public $postalCode;
    public $phoneNumber;
    public $createdAt;
    public $updatedAt;

    public $asnef;

    public function __construct(array $attributes, $asnef = null)
    {
        $this->asnef = $asnef;
        $this->fill($attributes);

        if (isset($attributes['file']) && $attributes['file']) {
            $this->file = new File($attributes['file'], $asnef);
        }
        if (isset($attributes['status']) && $attributes['status']) {
            $this->status = new FileRecordStatus($attributes['status'], $asnef);
        }
    }
}