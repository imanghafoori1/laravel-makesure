<?php

namespace Imanghafoori\MakeSure\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class MakeSure
 *
 * @method static then($this)
 *
 */
class MakeSure extends Facade
{
    public static function getFacadeAccessor()
    {
        return \Imanghafoori\MakeSure\That::class;
    }
}
