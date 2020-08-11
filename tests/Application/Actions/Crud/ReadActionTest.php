<?php
namespace Tests\Application\Actions\Crud;

use App\Application\Actions\ActionPayload;
use Tests\TestCase;

class ReadActionTest extends TestCase{
    public function testAction(){
        $app = $this->getAppInstance();
        
        $request = $this->createRequest('POST' , 'crud/read');
        $request = $request->withParsedBody(['username' => 'mohammad123']);
        $response = $app->handle($request);

        $payload = (string) $response->getBody();

        $expectedPayload = new ActionPayload(200 , 'ok');
        $serializedPayload = json_encode($expectedPayload,JSON_PRETTY_PRINT);
        
        $this->assertEquals($serializedPayload,$payload);
    }
}