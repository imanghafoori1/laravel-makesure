<?php

namespace Imanghafoori\MakeSure;

use Imanghafoori\MakeSure\Expectations\Response;

class IsRespondedWith
{
    /**
     * @var \Imanghafoori\MakeSure\Chain
     */
    private $chain;

    /**
     * IsRespondedWith constructor.
     *
     * @param $chain
     */
    public function __construct(Chain $chain)
    {
        $this->chain = $chain;
    }

    public function isRespondedWith(): Response
    {
        return new Response($this->chain);
    }

    public function isOk()
    {
        $this->chain->data['assertion'][] = ['assertSuccessful', null];
    }
}
