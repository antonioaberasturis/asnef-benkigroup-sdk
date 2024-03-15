<?php

namespace Asnef\Benkigroup\Resources;

class FileRecordStatus
{
    use ResourceParser;

    public $id;
    public $name;
    public $description;

    public function __construct(array $attributes, $asnef = null)
    {
        $this->fill($attributes);
    }
}