<?php

namespace Test\Repositories;

use Guillermoandrae\Repositories\AbstractRepository;
use Guillermoandrae\Repositories\RepositoryFactory;
use PHPUnit\Framework\TestCase;

class RepositoryFactoryTest extends TestCase
{
    public function testFactory()
    {
        $expectedRepository = $this->getRepository('test1');
        $actualRepository = RepositoryFactory::factory('test1');
        $this->assertEquals($expectedRepository, $actualRepository);
    }

    public function testFactoryWithOptions()
    {
        $options = [];
        $expectedRepository = $this->getRepository('test2', $options);
        $actualRepository = RepositoryFactory::factory('test2', $options);
        $this->assertEquals($expectedRepository, $actualRepository);
    }

    public function testInvalidFactory()
    {
        $this->expectExceptionMessage('The guillermo repository does not exist');
        RepositoryFactory::factory('guillermo');
    }

    private function getRepository($alias, $options = null)
    {
        $className = ucfirst($alias) . 'Repository';
        $repository = $this->getMockForAbstractClass(
            AbstractRepository::class,
            [$options],
            $className
        );
        class_alias($className, sprintf('Guillermoandrae\Repositories\%s', $className));
        return $repository;
    }
}
