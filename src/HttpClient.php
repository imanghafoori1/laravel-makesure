<?php

namespace Imanghafoori\MakeSure;

/**
 * Class HttpClient
 *
 * @method IsRespondedWith sendingPostRequest($uri, array $data = [], array $headers = [])
 * @method IsRespondedWith sendingJsonPostRequest($uri, array $data = [], array $headers = [])
 * @method IsRespondedWith sendingDeleteRequest($uri, array $data = [], array $headers = [])
 * @method IsRespondedWith sendingJsonDeleteRequest($uri, array $data = [], array $headers = [])
 * @method IsRespondedWith sendingPutRequest($uri, array $data = [], array $headers = [])
 * @method IsRespondedWith sendingJsonPutRequest($uri, array $data = [], array $headers = [])
 * @method IsRespondedWith sendingPatchRequest($uri, array $data = [], array $headers = [])
 * @method IsRespondedWith sendingJsonPatchRequest($uri, array $data = [], array $headers = [])
 * @method IsRespondedWith sendingGetRequest($uri, array $headers = [])
 * @method IsRespondedWith sendingJsonGetRequest($uri, array $headers = [])
 *
 * @package Imanghafoori\MakeSure
 */
class HttpClient
{
    private $chain;

    private $methods = [
        'sendingPostRequest' => 'post',
        'sendingJsonPostRequest' => 'postJson',
        'sendingDeleteRequest' => 'delete',
        'sendingJsonDeleteRequest' => 'deleteJson',
        'sendingPutRequest' => 'put',
        'sendingJsonPutRequest' => 'putJson',
        'sendingPatchRequest' => 'patch',
        'sendingJsonPatchRequest' => 'patchJson',
        'sendingGetRequest' => 'get',
        'sendingJsonGetRequest' => 'getJson',
    ];

    /**
     * HttpClient constructor.
     *
     * @param $phpunit
     */
    public function __construct($phpunit)
    {
        $this->chain = new Chain($phpunit);
    }

    public function __call($method, $params): IsRespondedWith
    {
        return $this->sendRequest($method, ...$params);
    }

    private function sendRequest($method, ...$data): IsRespondedWith
    {
        $this->chain->data['http'] = [$this->methods[$method], $data];

        return new IsRespondedWith($this->chain);
    }

    public function exceptionIsThrown($type)
    {
        $this->chain->data['exception'] = $type;
    }

    public function whenEventHappens($event): self
    {
        $this->chain->data['event'] = $event;

        return $this;
    }
}