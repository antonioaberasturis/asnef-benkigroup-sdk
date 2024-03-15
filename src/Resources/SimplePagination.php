<?php

namespace Asnef\Benkigroup\Resources;

class SimplePagination
{
    use ResourceParser;

    public $data = [];
    public $currentPage = 1;
    public $perPage = 15;
    public $from = 0;
    public $to = 0;
    public $count = 0;
    public $hasPages = false;
    public $hasMorePages = false;

    public function __construct(array $attributes, $class, $asnef = null)
    {
        $this->fill($attributes);
        $this->data = array_map(function (array $classAttributes) use ($class, $asnef) {
            return new $class($classAttributes, $asnef);
        }, $attributes['data']);
    }
}
