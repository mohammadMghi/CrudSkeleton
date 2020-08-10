<?php
declare(strict_types=1);

namespace App\Application\Actions\Crud;

use App\Application\Actions\User\UserAction;
use App\Domain\Crud\Repository\CrudRepository;
use App\Domain\Model\Crud;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class CreateCrudAction extends CrudAction{

    public function __construct(LoggerInterface $loggerInterface,CrudRepository $crudRepository)
    {
        parent::__construct($loggerInterface , $crudRepository);
    }

    /** 
     *  @return Response
    */
    public function action():Response
    {
        $data = $this->request->getParsedBody() ?? [];
        
        $username =$data['username'];
        $firstname = $data['firstname'];
        $password = $data['password'];

        $crud =new Crud(null,$username,$firstname,$password);

        $response =$this->crudRepository->create($crud);

        return $this->respondWithData($response,200);
    }

}