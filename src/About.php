<?php

namespace Imanghafoori\MakeSure;

class About
{
    public function about($phpunit) : HttpClient
    {
        return new HttpClient($phpunit);
    }
}
