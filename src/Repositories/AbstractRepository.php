<?php

namespace Guillermoandrae\Repositories;

use Guillermoandrae\Common\DumpableTrait;

abstract class AbstractRepository implements RepositoryInterface
{
    use DumpableTrait;

    /**
     * Repository options.
     *
     * @var mixed|null
     */
    protected mixed $options;

    /**
     * Constructor. Provides the ability to inject dependencies using the RepositoryFactory.
     *
     * @see RepositoryFactory
     * @param mixed|null $options  The repository options.
     */
    public function __construct(mixed $options = null)
    {
        $this->options = $options;
    }
}
