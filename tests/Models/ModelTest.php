<?php

namespace Test\Models;

use Guillermoandrae\Models\AbstractModel;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
    public function testToJson()
    {
        $model = $this->getMockForAbstractClass(AbstractModel::class);
        $this->assertSame(json_encode($model->toArray()), $model->toJson());
    }
}
