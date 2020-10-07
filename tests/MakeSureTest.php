<?php

use Illuminate\Support\Facades\Event;
use Imanghafoori\MakeSure\Facades\MakeSure;

class MakeSureTest extends TestCase
{
    public function test_sendingGetRequest()
    {
        $response = Mockery::mock();
        $response->shouldReceive('assertStatus')->once()->with(403);
        $_this = Mockery::mock();

        $_this->shouldReceive('get')->once()->andReturn($response);
        MakeSure::about($_this)->sendingGetRequest('/welcome')->isRespondedWith()->statusCode(403);
    }

    public function test_sendingJsonGetRequest()
    {
        $response = Mockery::mock();
        $response->shouldReceive('assertStatus')->once()->with(403);
        $_this = Mockery::mock();

        $_this->shouldReceive('getJson')->once()->andReturn($response);
        MakeSure::about($_this)->sendingJsonGetRequest('/welcome')->isRespondedWith()->statusCode(403);
    }

    public function test_sendingPostRequest()
    {
        $formData = ['asdc' => 'yuik'];

        $_this = Mockery::mock();
        $_this->shouldReceive('post')->with('welcome', $formData)->once();
        MakeSure::about($_this)->sendingPostRequest('welcome', $formData);
    }

    public function test_sendingJsonPostRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $_this = Mockery::mock();
        $_this->shouldReceive('postJson')->with('welcome', $formData)->once();
        MakeSure::about($_this)->sendingJsonPostRequest('welcome', $formData);
    }

    public function test_sendingPutRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $_this = Mockery::mock();
        $_this->shouldReceive('put')->with('welcome', $formData)->once();
        MakeSure::about($_this)->sendingPutRequest('welcome', $formData);
    }

    public function test_sendingJsonPutRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $_this = Mockery::mock();
        $_this->shouldReceive('putJson')->with('welcome', $formData)->once();
        MakeSure::about($_this)->sendingJsonPutRequest('welcome', $formData);
    }

    public function test_sendingPatchRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $_this = Mockery::mock();
        $_this->shouldReceive('patch')->with('welcome', $formData)->once();
        MakeSure::about($_this)->sendingPatchRequest('welcome', $formData);
    }

    public function test_sendingJsonPatchRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $_this = Mockery::mock();
        $_this->shouldReceive('patchJson')->with('welcome', $formData)->once();
        MakeSure::about($_this)->sendingJsonPatchRequest('welcome', $formData);
    }

    public function test_sendingDeleteRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $_this = Mockery::mock();
        $_this->shouldReceive('delete')->with('welcome', $formData)->once();
        MakeSure::about($_this)->sendingDeleteRequest('welcome', $formData);
    }

    public function test_sendingJsonDeleteRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $_this = Mockery::mock();
        $_this->shouldReceive('delete')->with('welcome', $formData)->once();
        MakeSure::about($_this)->sendingDeleteRequest('welcome', $formData);
    }

    public function test_isOk()
    {
        $response = Mockery::mock();
        $response->shouldReceive('assertSuccessful')->once()->with(null);

        $phpunit = Mockery::mock();
        $phpunit->shouldReceive('get')->once()->andReturn($response);
        MakeSure::about($phpunit)->sendingGetRequest('/welcome')->isOk();
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

    public function test_redirect()
    {
        $response = Mockery::mock();
        $response->shouldReceive('assertRedirect')->once()->with('/login');
        $_this = Mockery::mock();

        $_this->shouldReceive('get')->once()->andReturn($response);
        MakeSure::about($_this)->sendingGetRequest('/profile')->isRespondedWith()->redirect('/login');
    }

    public function test_exceptionIsThrown()
    {
        $exception = new class {};
        $_this = Mockery::mock();

        $_this->shouldReceive('expectException')->once()->with($exception);
        MakeSure::about($_this)->exceptionIsThrown($exception);
    }

    public function test_whenEventHappens()
    {
        $event = new class {};
        Event::shouldReceive('dispatch')->once()->with($event);
        MakeSure::about(Mockery::mock())->whenEventHappens($event);
    }
}
