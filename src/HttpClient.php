<?php

namespace Imanghafoori\MakeSure;

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

    public function sendRequest($method, ...$data): IsRespondedWith
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