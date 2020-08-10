<?php
declare(strict_types=1);

namespace Tests\Application\Actions\Crud;

use App\Application\Actions\ActionPayload;
use Tests\TestCase;

class CreateAction extends TestCase{
    public function testAction()
    {
        $app = $this->getAppInstance();
        
        $request = $this->createRequest('POST' , 'crud/create');
        $request = $request->withParsedBody(['username' => 'mohammad','firstname'=>'moghadasi' , 'password'=> '5458565']);
        $response = $app->handle($request);

        $payload = (string) $response->getBody();

        $expectedPayload = new ActionPayload(200 , 'ok');
        $serializedPayload = json_encode($expectedPayload,JSON_PRETTY_PRINT);
        
        $this->assertEquals($serializedPayload,$payload);
        
    }
}