<?php

namespace GuillermoandraeTest\Models;

use PHPUnit\Framework\TestCase;
use Guillermoandrae\Models\AbstractModel;

class ModelTest extends TestCase
{
    public function testOffsetGet()
    {
        $data = ['hey' => 'there', 'us' => 'them'];
        $model = $this->getMockForAbstractClass(AbstractModel::class, [$data]);
        $this->assertSame('there', $model['hey']);
    }

    public function testOffsetSet()
    {
        $data = ['hey' => 'there'];
        $model = $this->getMockForAbstractClass(AbstractModel::class, [$data]);
        $model['you'] = 'two';
        $this->assertSame('two', $model['you']);
    }

    public function testOffsetSetNullOffset()
    {
        $model = $this->getMockForAbstractClass(AbstractModel::class);
        $model[] = 'two';
        $this->assertSame('two', $model[0]);
    }
    
    public function testOffsetUnset()
    {
        $data = ['hey' => 'there', 'me' => 'you'];
        $model = $this->getMockForAbstractClass(AbstractModel::class, [$data]);
        unset($model['me']);
        $this->assertNull($model['me']);
    }

    public function testToJson()
    {
        $model = $this->getMockForAbstractClass(AbstractModel::class);
        $this->assertSame(json_encode($model->toArray()), $model->toJson());
    }
}
