<?php

namespace App\Models;

use App\Common\JsonableTrait;

abstract class AbstractModel implements ModelInterface
{
    use JsonableTrait;
}
