<?php

namespace Guillermoandrae\Repositories;

use Guillermoandrae\Common\DumpableTrait;
use Guillermoandrae\Models\ModelInterface;

abstract class AbstractRepository implements RepositoryInterface
{
    use DumpableTrait;
}
