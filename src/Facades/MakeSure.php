<?php

namespace Imanghafoori\MakeSure\Facades;

use Illuminate\Support\Facades\Facade;
use Imanghafoori\MakeSure\HttpClient;

/**
 * Class MakeSure.
 *
 * @method static HttpClient about($this)
 */
class MakeSure extends Facade
{
    public static function getFacadeAccessor()
    {
        return \Imanghafoori\MakeSure\About::class;
    }
}
