<?php

namespace Guillermoandrae\Repositories;

final class RepositoryFactory
{
    /**
     * The namespace to use when creating repository objects.
     *
     * @var string
     */
    private static $namespace;

    /**
     * The default namespace to use when creating repository objects.
     *
     * @var string
     */
    private static $defaultNamespace = 'App\Repositories';

    /**
     * Sets the namespace to use when creating repository objects.
     *
     * @param string $namespace The namespace for repositories.
     */
    public static function setNamespace(string $namespace)
    {
        self::$namespace = $namespace;
    }

    /**
     * Returns the namespace to use when creating repository objects.
     *
     * @return string
     */
    public static function getNamespace(): string
    {
        if (!self::$namespace) {
            self::$namespace = self::$defaultNamespace;
        }
        return self::$namespace;
    }

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
                self::getNamespace(),
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
