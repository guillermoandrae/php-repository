<?php

namespace App\Common;

trait JsonableTrait
{
    final public function __toString()
    {
        return $this->toJson();
    }

    abstract public function toJson(): string;
}
