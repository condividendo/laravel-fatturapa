<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Entity;
use Condividendo\FatturaPA\Traits\Makeable;

abstract class AbstractEntity implements Entity
{
    use Makeable;
}
