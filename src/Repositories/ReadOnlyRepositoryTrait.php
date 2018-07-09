<?php

namespace Guillermoandrae\Repositories;

use BadMethodCallException;
use Guillermoandrae\Models\ModelInterface;

trait ReadOnlyRepositoryTrait
{
    final public function create(array $options): ModelInterface
    {
        unset($options);
        return $this->callUnsupportedMethod('create');
    }

    final public function update($id, array $options): ModelInterface
    {
        unset($id, $options);
        return $this->callUnsupportedMethod('update');
    }

    final public function delete($id): bool
    {
        unset($id);
        return $this->callUnsupportedMethod('delete');
    }

    /**
     * Throws an exception and uses the method name to generate the message.
     *
     * @param string $method The name of the unsupported method.
     */
    protected function callUnsupportedMethod(string $method)
    {
        throw new BadMethodCallException(
            sprintf('The %s method of this read-only repository is not supported.', $method)
        );
    }
}
