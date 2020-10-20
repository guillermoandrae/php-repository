<?php

namespace Guillermoandrae\Repositories;

use Guillermoandrae\Models\ModelInterface;

trait ReadOnlyRepositoryTrait
{
    use UnsupportedMethodRepositoryTrait;

    final public function create(array $options): ?ModelInterface
    {
        unset($options);
        return $this->callUnsupportedMethod('create');
    }

    final public function update($id, array $options): ?ModelInterface
    {
        unset($id, $options);
        return $this->callUnsupportedMethod('update');
    }

    final public function delete($id): bool
    {
        unset($id);
        return $this->callUnsupportedMethod('delete');
    }
}
