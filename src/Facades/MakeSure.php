<?php

namespace Imanghafoori\MakeSure\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class HttpClient
 *
 * @method IsRespondedWith sendingPostRequest
 * @method IsRespondedWith sendingJsonPostRequest
 * @method IsRespondedWith sendingDeleteRequest
 * @method IsRespondedWith sendingJsonDeleteRequest
 * @method IsRespondedWith sendingPutRequest($uri)
 * @method IsRespondedWith sendingJsonPutRequest
 * @method IsRespondedWith sendingPatchRequest
 * @method IsRespondedWith sendingJsonPatchRequest
 * @method IsRespondedWith sendingGetRequest
 * @method IsRespondedWith sendingJsonGetRequest
 *
 * @package Imanghafoori\HeyMan\MakeSure
 */
class MakeSure extends Facade
{
    public static function getFacadeAccessor()
    {
        return \Imanghafoori\MakeSure\That::class;
    }
}
