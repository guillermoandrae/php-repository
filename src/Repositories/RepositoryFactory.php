<?php

namespace App\Repositories;

class RepositoryFactory
{
    /**
     * Returns the desired repository using the provided data.
     *
     * @param string $name The name of the desired repository.
     * @param mixed|null $options The data needed to build the repository.
     * @return RepositoryInterface
     * @throws InvalidRepositoryException  Thrown when an invalid repository is
     *                                     requested.
     */
    public static function factory(string $name, $options = null): RepositoryInterface
    {
        try {
            $className = sprintf(
                '%s\%sRepository',
                __NAMESPACE__,
                ucfirst(strtolower($name))
            );
            $reflectionClass = new \ReflectionClass($className);
            if (is_null($options)) {
                return $reflectionClass->newInstance();
            }
            return $reflectionClass->newInstance($options);
        } catch (\ReflectionException $ex) {
            throw new InvalidRepositoryException(
                sprintf('The %s repository does not exist.', $name)
            );
        }
    }
}
