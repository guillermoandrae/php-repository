<?php

namespace Test\Common;

use Guillermoandrae\Common\AggregateTrait;
use PHPUnit\Framework\TestCase;

class AggregateTraitTest extends TestCase
{
    /**
     * @var AggregateTrait
     */
    protected $aggregate;

    public function testOffsetSetAndOffsetGet()
    {
        $this->aggregate->offsetSet(1, 2);
        $this->assertSame(2, $this->aggregate->offsetGet(1));
    }

    public function testGetIterator()
    {
        $this->assertInstanceOf(\ArrayIterator::class, $this->aggregate->getIterator());
    }

    protected function setUp()
    {
        $this->aggregate = $this->getMockForTrait(AggregateTrait::class, [[1]]);
    }
}
