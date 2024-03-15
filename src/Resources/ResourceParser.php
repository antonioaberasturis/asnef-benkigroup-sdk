<?php

namespace Asnef\Benkigroup\Resources;

trait ResourceParser
{
    protected function fill(array $attributes)
    {
        $classRefVars = get_class_vars(get_class($this));
        foreach ($attributes as $key => $value) {
            $key = $this->camelCase($key);
            if (in_array($key, array_keys($classRefVars))) {
                $this->{$key} = $value;
            }
        }
    }

    protected function camelCase(string $key): string
    {
        $parts = explode('_', $key);

        foreach ($parts as $i => $part) {
            if ($i !== 0) {
                $parts[$i] = ucfirst($part);
            }
        }

        return str_replace(' ', '', implode(' ', $parts));
    }
}
