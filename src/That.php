<?php

namespace Imanghafoori\MakeSure;

class That
{
    public function that($phpunit) : HttpClient
    {
        return new HttpClient($phpunit);
    }
}
