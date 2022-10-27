<?php

namespace Condividendo\FatturaPA\Tags;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Traits\Makeable;

abstract class AbstractTag implements Tag
{
    use Makeable;
}
