<?php

namespace Asnef\Benkigroup\Resources;

class FileRecordHistory
{
    use ResourceParser;

    public $id;
    public $file;
    public $record;
    public $status;
    public $fileId;
    public $recordId;
    public $statusId;
    public $customerId;
    public $contractId;
    public $operatorId;
    public $operatorName;
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
        if (isset($attributes['record']) && $attributes['record']) {
            $this->record = new FileRecord($attributes['record'], $asnef);
        }
        if (isset($attributes['status']) && $attributes['status']) {
            $this->status = new FileRecordStatus($attributes['status'], $asnef);
        }
    }
}
