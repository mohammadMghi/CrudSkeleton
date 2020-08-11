<?php
namespace App\Domain\Helper\Traits;

use App\Domain\Exceptions\CrudNotFoundException;
use App\Domain\Model\Crud;

use function DI\string;

trait HelperInfra{
    public function isEmptyCrud($crud){
        if(empty($crud)){
            return new CrudNotFoundException();
        }
    }

    public function setCrud($crudFound) : Crud
    {
        $crud = new Crud();
        $crud->setId($crudFound['_id']);
        $crud->setUsername($crudFound['username']);
        $crud->setFirstName($crudFound['firstName']);
        $crud->setLastName($crudFound['lastname']);
        return $crud;
    }
}