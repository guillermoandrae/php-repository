<?php

namespace Test\Common;

use App\Common\Collection;
use App\Common\CollectionInterface;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    /**
     * @var array
     */
    private $items = [
        ['name' => 'Me', 'age' => 30],
        ['name' => 'You', 'age' => 21],
        ['name' => 'Her', 'age' => 28],
        ['name' => 'Him', 'age' => 42],
    ];

    /**
     * @var CollectionInterface
     */
    private $collection;

    public function testAll()
    {
        $this->assertSame($this->items, $this->collection->all());
    }

    public function testFirst()
    {
        $this->assertSame($this->items[0], $this->collection->first());
    }

    public function testLast()
    {
        $this->assertSame($this->items[3], $this->collection->last());
    }

    public function testRandom()
    {
        $this->assertArrayHasKey('age', $this->collection->random());
    }

    public function testGet()
    {
        $this->assertSame($this->items[2], $this->collection->get(2));
    }

    public function testGetWithDefault()
    {
        $default = 'test';
        $this->assertSame($default, $this->collection->get(40, $default));
    }

    public function testHas()
    {
        $this->assertFalse($this->collection->has('test'));
    }

    public function testRemove()
    {
        $collection = new Collection(['test', 'this', 'method']);
        $collection->remove(1);
        $this->assertCount(2, $collection);
    }

    public function testSortBy()
    {
        $sorted = $this->collection->sortBy('age');
        $this->assertTrue($sorted->first()['age'] < $sorted->last()['age']);
    }

    public function testCount()
    {
        $this->assertSame(count($this->collection->all()), $this->collection->count());
    }

    public function testIsEmpty()
    {
        $this->assertTrue((new Collection())->isEmpty());
    }

    public function testIsNotEmpty()
    {
        $this->assertFalse($this->collection->isEmpty());
    }

    public function testFilter()
    {
        $collection = new Collection([1, 2, 3]);
        $filteredCollection = $collection->filter(function ($var){
            return($var & 1);
        });
        $this->assertCount(2, $filteredCollection);
    }

    public function testMap()
    {
        $collection = new Collection([1, 2, 3]);
        $mappedCollection = $collection->map(function ($var){
            return($var + 3);
        });
        $this->assertSame([4, 5, 6], $mappedCollection->all());
    }

    public function testToArray()
    {
        $this->assertSame($this->items, $this->collection->toArray());
    }

    public function testToJson()
    {
        $this->assertSame(json_encode($this->items), $this->collection->toJson());
    }

    protected function setUp()
    {
        $this->collection = new Collection($this->items);
    }
}
