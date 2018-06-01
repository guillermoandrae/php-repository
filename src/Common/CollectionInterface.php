<?php

namespace App\Common;

interface CollectionInterface extends \ArrayAccess, \IteratorAggregate, ArrayableInterface
{
    /**
     * Builds the Collection object.
     *
     * @param array $items  The array of items used to build the collection.
     */
    public function __construct(array $items = []);

    /**
     * Returns all items in the collection.
     *
     * @return array
     */
    public function all(): array;

    /**
     * Returns the first item in the collection.
     *
     * @return mixed
     */
    public function first();

    /**
     * Returns the last item in the collection.
     *
     * @return mixed
     */
    public function last();

    /**
     * Returns a random item from the collection.
     *
     * @return mixed
     */
    public function random();

    /**
     * Returns the item associated with the provided key. If no item exists,
     * returns the provided default value.
     *
     * @param mixed $key  The key associated with the desired item.
     * @param null $default  The default value.
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * Determines whether or not the item associated with the provided key
     * exists.
     *
     * @param mixed $key  The key associated with the desired item.
     * @return bool
     */
    public function has($key): bool;

    /**
     * Removes the item associated with the provided key and returns the new
     * collection.
     *
     * @param mixed $key  The key associated with the desired item.
     * @return CollectionInterface
     */
    public function remove($key): CollectionInterface;

    /**
     * Returns the number of items in the collection.
     *
     * @return int
     */
    public function count(): int;

    /**
     * Determines whether or not the collection is empty.
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Returns a collection sorted by the provided field name.
     *
     * @param string $fieldName  The field name to use when grouping results.
     * @return CollectionInterface
     */
    public function sortBy(string $fieldName): CollectionInterface;

    /**
     * Returns a collection filtered by the provided callback.
     *
     * @param callable $callback  The callback to use when filtering.
     * @return CollectionInterface
     */
    public function filter(callable $callback): CollectionInterface;

    /**
     * Returns a collection wherein the provided callback has been applied to
     * all items.
     *
     * @param callable $callback  The callback to apply to all items.
     * @return CollectionInterface
     */
    public function map(callable $callback): CollectionInterface;
}
