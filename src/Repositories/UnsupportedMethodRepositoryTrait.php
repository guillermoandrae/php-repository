<?php

namespace Guillermoandrae\Repositories;

use BadMethodCallException;

trait UnsupportedMethodRepositoryTrait
{
    /**
     * Throws an exception and uses the method name to generate the message.
     *
     * @param string $method The name of the unsupported method.
     */
    protected function callUnsupportedMethod(string $method)
    {
        throw new BadMethodCallException(
            sprintf('The %s method of this repository is not supported.', $method)
        );
    }
}
