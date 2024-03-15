<?php

namespace Asnef\Benkigroup\Resources;

class Nature
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
