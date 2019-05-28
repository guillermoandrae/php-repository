<?php

namespace Guillermoandrae\Models;

use Guillermoandrae\Common\DumpableTrait;
use Guillermoandrae\Common\AbstractAggregate;

abstract class AbstractModel implements ModelInterface
{
    use DumpableTrait;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * Undocumented function
     *
     * @param [type] $data
     */
    public function __construct($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $this->data[$key] = $value;
            }
        }
    }

    final public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}
