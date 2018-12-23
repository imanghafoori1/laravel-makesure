<?php

namespace Imanghafoori\MakeSure;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Imanghafoori\MakeSure\Facades\MakeSure;

final class MakeSureServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        AliasLoader::getInstance()->alias('MakeSure', MakeSure::class);
    }
}
