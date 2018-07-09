<?php

namespace Guillermoandrae\Repositories;

use BadMethodCallException;
use Guillermoandrae\Models\ModelInterface;

trait ReadOnlyRepositoryTrait
{
    final public function create(array $options): ModelInterface
    {
        unset($options);
        return $this->raiseBadMethodCallException('create');
    }

    final public function update($id, array $options): ModelInterface
    {
        unset($id, $options);
        return $this->raiseBadMethodCallException('update');
    }

    final public function delete($id): bool
    {
        unset($id);
        return $this->raiseBadMethodCallException('delete');
    }

    /**
     * Throws an exception and uses the method name to generate the message.
     *
     * @param string $method The name of the unsupported method.
     */
    protected function raiseBadMethodCallException(string $method)
    {
        throw new BadMethodCallException(
            sprintf('The %s method of this repository is not supported.', $method)
        );
    }
}
