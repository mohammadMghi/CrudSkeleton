<?php
namespace App\Application\Actions\Crud;

use App\Domain\Crud\Repository\CrudRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LogerInerface;
use Psr\Log\LoggerInterface;

class ReadCrudAction extends CrudAction{
    
    public function __construct(LoggerInterface $logerInterface , CrudRepository $crudRepository){
        parent::__construct($logerInterface , $crudRepository);
    }
    
    public function Action() : ResponseInterface
    {
        $data = $this->request->getParsedBody() ?? [];
        
        $response = $this->crudRepository->read($data['username']);
        
        return $this->respondWithData($response , 200);

    } 
}