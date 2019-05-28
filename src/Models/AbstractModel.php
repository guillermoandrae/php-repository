<?php

namespace Guillermoandrae\Models;

use Guillermoandrae\Common\DumpableTrait;
use Guillermoandrae\Common\AbstractAggregate;

abstract class AbstractModel extends AbstractAggregate implements ModelInterface
{
    use DumpableTrait;

    final public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
