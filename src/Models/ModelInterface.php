<?php

namespace Guillermoandrae\Models;

use Guillermoandrae\Common\JsonableInterface;
use Guillermoandrae\Common\ArrayableInterface;
use Guillermoandrae\Common\AggregateInterface;

interface ModelInterface extends AggregateInterface, ArrayableInterface, JsonableInterface
{
}
