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

    public function testFactoryWithNamespace()
    {
        $namespace = 'MyApp';
        RepositoryFactory::setNamespace($namespace);
        $expectedRepository = $this->getRepository('test1', null, $namespace);
        $actualRepository = RepositoryFactory::factory('test1');
        $this->assertEquals($expectedRepository, $actualRepository);
    }

    public function testInvalidFactory()
    {
        $this->expectExceptionMessage('The guillermo repository does not exist');
        RepositoryFactory::factory('guillermo');
    }

    private function getRepository(string $alias, $options = null, string $namespace = 'App\Repositories')
    {
        $className = ucfirst($alias) . 'Repository';
        $repository = $this->getMockForAbstractClass(
            AbstractRepository::class,
            [$options],
            $className
        );
        class_alias($className, sprintf('%s\%s', $namespace, $className));
        return $repository;
    }
}
