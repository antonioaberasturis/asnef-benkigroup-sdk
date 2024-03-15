<?php

namespace Asnef\Benkigroup\Resources;

class WorstSituation
{
    use ResourceParser;

    public $id;
    public $code;
    public $name;
    public $description;

    public function __construct(array $attributes, $asnef = null)
    {
        $this->fill($attributes);
    }
}