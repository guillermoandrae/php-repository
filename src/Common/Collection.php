<?php

namespace App\Common;

final class Collection implements CollectionInterface
{
    use AggregateTrait, JsonableTrait;

    public function all(): array
    {
        return $this->items;
    }

    public function first()
    {
        return $this->items[0];
    }

    public function last()
    {
        $array = array_reverse($this->items);
        return $array[0];
    }

    public function random()
    {
        $key = array_rand($this->items);
        return $this->get($key);
    }

    public function get($key, $default = null)
    {
        if ($this->offsetExists($key)) {
            return $this->items[$key];
        }
        return $default;
    }

    public function has($key): bool
    {
        return $this->offsetExists($key);
    }

    public function remove($key): CollectionInterface
    {
        $this->offsetUnset($key);
        return $this;
    }

    public function sortBy(string $fieldName): CollectionInterface
    {
        $results = $this->items;
        usort($results, function ($item1, $item2) use ($fieldName) {
            return $item1[$fieldName] <=> $item2[$fieldName];
        });
        return new static($results);
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    public function filter(callable $callback): CollectionInterface
    {
        return new static(array_filter($this->items, $callback));
    }

    public function map(callable $callback): CollectionInterface
    {
        return new static(array_map($callback, $this->items));
    }

    public function toArray(): array
    {
        return $this->all();
    }

    public function toJson(): string
    {
        return json_encode($this->items);
    }
}
