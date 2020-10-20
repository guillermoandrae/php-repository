<?php

namespace Guillermoandrae\Repositories;

use Guillermoandrae\Common\DumpableTrait;
use Guillermoandrae\Models\ModelInterface;

abstract class AbstractRepository implements RepositoryInterface
{
    use DumpableTrait;

    protected $options;

    public function __construct($options = null)
    {
        $this->options = $options;
    }

    public function find($id): ?ModelInterface
    {
        return $this->findById($id);
    }

    public function findById($id): ?ModelInterface
    {
        $collection = $this->findWhere(['id' => $id]);
        return $collection->first();
    }
}
