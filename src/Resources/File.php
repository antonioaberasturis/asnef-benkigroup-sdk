<?php

namespace Asnef\Benkigroup\Resources;

class File
{
    use ResourceParser;

    public $id;
    public $status;
    public $statusId;
    public $name;
    public $createdAt;
    public $updatedAt;

    public $asnef;

    public function __construct(array $attributes, $asnef = null)
    {
        $this->asnef = $asnef;
        $this->fill($attributes);

        if (isset($attributes['status']) && $attributes['status']) {
            $this->status = new FileStatus($attributes['status'], $asnef);
        }
    }
}