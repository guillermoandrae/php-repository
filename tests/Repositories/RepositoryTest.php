<?php

namespace GuillermoandraeTest\Repositories;

use Guillermoandrae\Common\Collection;
use Guillermoandrae\Models\AbstractModel;
use Guillermoandrae\Repositories\AbstractRepository;
use Guillermoandrae\Repositories\RepositoryInterface;
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

    protected function setUp()
    {
        $this->repository = $this->getMockForAbstractClass(AbstractRepository::class);
    }
}
