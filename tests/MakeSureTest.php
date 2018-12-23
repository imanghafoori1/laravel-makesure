<?php

use Imanghafoori\MakeSure\Facades\MakeSure;

class MakeSureTest extends TestCase
{
    /**
     *
     */
    public function test_sendingGetRequest()
    {
        $response = Mockery::mock();
        $response->shouldReceive('assertStatus')->once()->with(403);
        $testCase = Mockery::mock();

        $testCase->shouldReceive('get')->once()->andReturn($response);
        MakeSure::that($testCase)->sendingGetRequest('/welcome')->isRespondedWith()->statusCode(403);
    }

    public function test_sendingJsonGetRequest()
    {
        $response = Mockery::mock();
        $response->shouldReceive('assertStatus')->once()->with(403);
        $testCase = Mockery::mock();

        $testCase->shouldReceive('getJson')->once()->andReturn($response);
        MakeSure::that($testCase)->sendingJsonGetRequest('/welcome')->isRespondedWith()->statusCode(403);
    }

    public function test_sendingPostRequest()
    {
        $formData = ['asdc' => 'yuik'];

        $testCase = Mockery::mock();
        $testCase->shouldReceive('post')->with('welcome', $formData)->once();
        MakeSure::that($testCase)->sendingPostRequest('welcome', $formData);
    }

    public function test_sendingJsonPostRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $testCase = Mockery::mock();
        $testCase->shouldReceive('postJson')->with('welcome', $formData)->once();
        MakeSure::that($testCase)->sendingJsonPostRequest('welcome', $formData);
    }

    public function test_sendingPutRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $testCase = Mockery::mock();
        $testCase->shouldReceive('put')->with('welcome', $formData)->once();
        MakeSure::that($testCase)->sendingPutRequest('welcome', $formData);
    }

    public function test_sendingJsonPutRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $testCase = Mockery::mock();
        $testCase->shouldReceive('putJson')->with('welcome', $formData)->once();
        MakeSure::that($testCase)->sendingJsonPutRequest('welcome', $formData);
    }

    public function test_sendingPatchRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $testCase = Mockery::mock();
        $testCase->shouldReceive('patch')->with('welcome', $formData)->once();
        MakeSure::that($testCase)->sendingPatchRequest('welcome', $formData);
    }

    public function test_sendingJsonPatchRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $testCase = Mockery::mock();
        $testCase->shouldReceive('patchJson')->with('welcome', $formData)->once();
        MakeSure::that($testCase)->sendingJsonPatchRequest('welcome', $formData);
    }

    public function test_sendingDeleteRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $testCase = Mockery::mock();
        $testCase->shouldReceive('delete')->with('welcome', $formData)->once();
        MakeSure::that($testCase)->sendingDeleteRequest('welcome', $formData);
    }

    public function test_sendingJsonDeleteRequest()
    {
        $formData = ['asdc' => 'yuik'];
        $testCase = Mockery::mock();
        $testCase->shouldReceive('delete')->with('welcome', $formData)->once();
        MakeSure::that($testCase)->sendingDeleteRequest('welcome', $formData);
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
