<?php

namespace Guillermoandrae\Repositories;

use Guillermoandrae\Models\ModelInterface;

abstract class AbstractRepository implements RepositoryInterface
{
    protected $options;

    public function __construct($options = null)
    {
        $this->options = $options;
    }

    public function findById($id): ModelInterface
    {
        $collection = $this->findWhere(['id' => $id]);
        return $collection->first();
    }

    public function create(array $data): ModelInterface
    {
        return $this->raiseBadMethodCallException('create');
    }

    public function update($id, array $data): ModelInterface
    {
        return $this->raiseBadMethodCallException('update');
    }

    public function delete($id): bool
    {
        return $this->raiseBadMethodCallException('delete');
    }

    private function raiseBadMethodCallException(string $methodName)
    {
        throw new \BadMethodCallException(
            sprintf('The %s method of this repository is not supported.', $methodName)
        );
    }
}
