<?php
namespace App\Domain\Crud\Repository;

use App\Domain\Model\Crud;

interface CrudRepository{
    public function connection();

    public function create(Crud $crud) : Crud;

    public function read(string $username) : Crud;
    
    public function update(Crud $crud) : Crud;

    public function delete($id) : bool;
}