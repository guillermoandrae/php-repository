<?php

namespace Guillermoandrae\Models;

use Guillermoandrae\Common\DumpableTrait;

abstract class AbstractModel implements ModelInterface
{
    use DumpableTrait;

    final public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
