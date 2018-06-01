<?php

namespace App\Common;

interface ArrayableInterface
{
    /**
     * Returns the object as an array.
     *
     * @return array
     */
    public function toArray(): array;
}
