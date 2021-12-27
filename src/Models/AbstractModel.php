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
    protected array $data = [];

    /**
     * Undocumented function
     *
     * @param [type] $data
     */
    public function __construct($data = null)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $this->data[$key] = $value;
            }
        }
    }

    final public function offsetExists($offset): bool
    {
        return isset($this->data[$offset]);
    }

    final public function offsetGet($offset): mixed
    {
        return $this->offsetExists($offset) ? $this->data[$offset] : null;
    }

    final public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    final public function offsetUnset($offset): void
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
