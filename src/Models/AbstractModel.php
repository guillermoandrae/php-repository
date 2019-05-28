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

    final public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    final public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->data[$offset] : null;
    }

    final public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    final public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    final public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public function toArray(): array
    {
        return $this->data;
    }
}
