<?php

class MakeSureTest extends TestCase
{
    public function test_sendingGetRequest()
    {
        $response = Mockery::mock();
        $response->shouldReceive('assertStatus')->once()->with(403);
        $redirector = Mockery::mock();

        $redirector->shouldReceive('get')->once()->andReturn($response);
        MakeSure::that($redirector)->sendingGetRequest('/welcome')->isRespondedWith()->statusCode(403);
    }

    public function test_sendingJsonGetRequest()
    {
        $response = Mockery::mock();
        $response->shouldReceive('assertStatus')->once()->with(403);
        $redirector = Mockery::mock();

        $redirector->shouldReceive('getJson')->once()->andReturn($response);
        MakeSure::that($redirector)->sendingJsonGetRequest('/welcome')->isRespondedWith()->statusCode(403);
    }

    public function test_sendingPostRequest()
    {
        $formData = ['asdc' => 'yuik'];

        $redirector = Mockery::mock();
        $redirector->shouldReceive('post')->with('welcome', $formData)->once();
        MakeSure::that($redirector)->sendingPostRequest('welcome', $formData);
    }

    public function test_sendingJsonPostRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $redirector = Mockery::mock();
        $redirector->shouldReceive('postJson')->with('welcome', $formData)->once();
        MakeSure::that($redirector)->sendingJsonPostRequest('welcome', $formData);
    }

    public function test_sendingPutRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $redirector = Mockery::mock();
        $redirector->shouldReceive('put')->with('welcome', $formData)->once();
        MakeSure::that($redirector)->sendingPutRequest('welcome', $formData);
    }

    public function test_sendingJsonPutRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $redirector = Mockery::mock();
        $redirector->shouldReceive('putJson')->with('welcome', $formData)->once();
        MakeSure::that($redirector)->sendingJsonPutRequest('welcome', $formData);
    }

    public function test_sendingPatchRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $redirector = Mockery::mock();
        $redirector->shouldReceive('patch')->with('welcome', $formData)->once();
        MakeSure::that($redirector)->sendingPatchRequest('welcome', $formData);
    }

    public function test_sendingJsonPatchRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $redirector = Mockery::mock();
        $redirector->shouldReceive('patchJson')->with('welcome', $formData)->once();
        MakeSure::that($redirector)->sendingJsonPatchRequest('welcome', $formData);
    }

    public function test_sendingDeleteRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $redirector = Mockery::mock();
        $redirector->shouldReceive('delete')->with('welcome', $formData)->once();
        MakeSure::that($redirector)->sendingDeleteRequest('welcome', $formData);
    }

    public function test_sendingJsonDeleteRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $redirector = Mockery::mock();
        $redirector->shouldReceive('delete')->with('welcome', $formData)->once();
        MakeSure::that($redirector)->sendingDeleteRequest('welcome', $formData);
    }

    public function test_isOk()
    {
        $response = Mockery::mock();
        $response->shouldReceive('assertSuccessful')->once()->with(null);

        $phpunit = Mockery::mock();
        $phpunit->shouldReceive('get')->once()->andReturn($response);
        MakeSure::that($phpunit)->sendingGetRequest('/welcome')->isOk();
    }

    public function test_statusCode()
    {
        $chain = Mockery::mock(Imanghafoori\MakeSure\Chain::class);
        $resp = new \Imanghafoori\MakeSure\Expectations\Response($chain);
        $resp->success();
        $this->assertEquals([['assertSuccessful', null]], $chain->data['assertion']);
    }

    public function test_forbiddenCode()
    {
        $chain = Mockery::mock(Imanghafoori\MakeSure\Chain::class);
        $resp = new \Imanghafoori\MakeSure\Expectations\Response($chain);
        $resp->forbiddenStatus();
        $this->assertEquals([['assertStatus', 403]], $chain->data['assertion']);
    }

    public function test_success()
    {
        $chain = Mockery::mock(Imanghafoori\MakeSure\Chain::class);
        $resp = new \Imanghafoori\MakeSure\Expectations\Response($chain);
        $resp->success();
        $this->assertEquals([['assertSuccessful', null]], $chain->data['assertion']);
    }
}
