<?php

namespace Test\Repositories;

use App\Common\Collection;
use App\Models\AbstractModel;
use App\Repositories\AbstractRepository;
use App\Repositories\RepositoryInterface;
use PHPUnit\Framework\TestCase;

class RepositoryTest extends TestCase
{
    /**
     * @var RepositoryInterface
     */
    private $repository;

    public function testFindById()
    {
        $id = 1;
        $model = $this->getMockForAbstractClass(AbstractModel::class);
        $this->repository->expects($this->once())
            ->method('findWhere')
            ->with($this->equalTo(['id' => $id]))
            ->willReturn(new Collection([$model]));
        $this->assertSame($model, $this->repository->findById($id));
    }


    public function testCreate()
    {
        $this->expectExceptionMessage('The create method of this repository is not supported.');
        $this->repository->create([]);
    }

    public function testUpdate()
    {
        $this->expectExceptionMessage('The update method of this repository is not supported.');
        $this->repository->update('1', []);
    }

    public function testDelete()
    {
        $this->expectExceptionMessage('The delete method of this repository is not supported.');
        $this->repository->delete('1');
    }

    protected function setUp()
    {
        $this->repository = $this->getMockForAbstractClass(AbstractRepository::class);
    }
}
