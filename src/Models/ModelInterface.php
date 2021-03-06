<?php

namespace Guillermoandrae\Models;

use Guillermoandrae\Common\JsonableInterface;
use Guillermoandrae\Common\ArrayableInterface;

interface ModelInterface extends \ArrayAccess, ArrayableInterface, JsonableInterface
{
}
