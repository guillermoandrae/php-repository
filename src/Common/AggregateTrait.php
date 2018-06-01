<?php

namespace App\Common;

trait AggregateTrait
{
    /**
     * @var array
     */
    protected $items;

    /**
     * Builds the Collection object.
     *
     * @param array $items  The array of items used to build the collection.
     */
    final public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * Determines whether or not an item associated with the provided key exists.
     *
     * @param mixed $key  The key associated with the desired item.
     * @return bool
     */
    final public function offsetExists($key)
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * Returns the item associated with the provided key.
     *
     * @param mixed $key  The key associated with the desired item.
     * @return mixed
     */
    final public function offsetGet($key)
    {
        return $this->items[$key];
    }

    /**
     * Registers an item using the provided key and value.
     *
     * @param mixed $key  The key to be associated with the desired item.
     * @param mixed $value  The value to be associated with the desired item.
     */
    final public function offsetSet($key, $value)
    {
        $this->items[$key] = $value;
    }

    /**
     * Un-registers an item using the provided key.
     *
     * @param mixed $key  The key associated with the desired item.
     */
    final public function offsetUnset($key)
    {
        unset($this->items[$key]);
    }

    /**
     * @return \ArrayIterator
     */
    final public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }
}
