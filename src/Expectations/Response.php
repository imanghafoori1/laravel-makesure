<?php

namespace Imanghafoori\MakeSure\Expectations;

use Imanghafoori\MakeSure\Chain;

class Response
{
    private $chain;

    /**
     * Response constructor.
     *
     * @param $chain
     */
    public function __construct(Chain $chain)
    {
        $this->chain = $chain;
    }

    public function redirect($url, $status = null): self 
    {
        $this->addAssertion('assertRedirect', $url);

        if (!is_null($status)) {
            $this->statusCode($status);
        }

        return $this;
    }

    public function statusCode($code): self
    {
        $this->addAssertion('assertStatus', $code);

        return $this;
    }

    public function success()
    {
        $this->addAssertion('assertSuccessful');
    }

    public function withError($value): self
    {
        $this->addAssertion('assertSessionHasErrors', $value);

        return $this;
    }

    public function forbiddenStatus(): self
    {
        return $this->statusCode(403);
    }

    /**
     * @param $value
     * @param $type
     */
    public function addAssertion($type, $value = null)
    {
        $this->chain->data['assertion'][] = [$type, $value];
    }
}
