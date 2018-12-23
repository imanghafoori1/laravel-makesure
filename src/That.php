<?php

namespace Imanghafoori\MakeSure;

class That
{
    public function that($phpunit)
    {
        return new HttpClient($phpunit);
    }
}