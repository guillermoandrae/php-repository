<?php

namespace Guillermoandrae\Repositories;

use BadMethodCallException;
use Guillermoandrae\Models\ModelInterface;

trait ReadOnlyRepositoryTrait
{
    final public function create(array $options): ModelInterface
    {
        unset($options);
        throw new BadMethodCallException(
            'The create method of this repository is not supported.'
        );
    }

    final public function update($id, array $options): ModelInterface
    {
        unset($id, $options);
        throw new BadMethodCallException(
            'The update method of this repository is not supported.'
        );
    }

    final public function delete($id): bool
    {
        unset($id);
        throw new BadMethodCallException(
            'The delete method of this repository is not supported.'
        );
    }
}
