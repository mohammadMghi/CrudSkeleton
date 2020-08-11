<?php
namespace App\Domain\Helper\Traits;

use App\Domain\Model\Crud;

trait HelperAppli{
    public function setCrud($data) : Crud
    {
        $crud = new Crud();
        $crud->setUsername($data['username']);
        $crud->setFirstName($data['firstname']);
        $crud->setLastName($data['lastname']);
        return $crud;
    }
}