<?php
namespace App\Domain\Crud\Repository;

use App\Domain\Model\Crud;

interface CrudRepository{
    public function connection();

    public function create(Crud $crud) : Crud;

    public function read();
    
    public function update();

    public function delete();
}