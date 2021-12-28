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
     * Constructor.
     *
     * @param mixed $data
     */
    public function __construct(mixed $data = null)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $this->data[$key] = $value;
            }
        }
    }

    final public function offsetExists(mixed $offset): bool
    {
        return isset($this->data[$offset]);
    }

    final public function offsetGet(mixed $offset): mixed
    {
        return $this->offsetExists($offset) ? $this->data[$offset] : null;
    }

    final public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    final public function offsetUnset(mixed $offset): void
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
