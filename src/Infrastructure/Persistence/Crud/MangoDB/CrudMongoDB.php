<?php
namespace App\Infrastructure\Persistence\Crud\MangoDB;

 
use App\Domain\Crud\Repository\CrudRepository;
use App\Domain\Model\Crud;
use App\Domain\User\User;
use App\Infrastructure\db\MongoDB;

class CrudMongoDB extends MongoDB implements CrudRepository{
    
    private $usersCollection;
    public function __construct($db = null)
    {
        if (!is_null($db)) {
            $this->db = $db;
            $this->usersCollection = $this->db->users;
        }
    }

    public function connection()
    {
        $this->mongoConnection();
        $this->usersCollection = $this->db->users;
    }

    public function create(Crud $crud) : Crud
    {
        $result = $this->usersCollection->insertOne($crud->getUser());
        $oid = json_decode(json_encode($result->getInsertedId()), true);
        $crud->setId($oid['$oid']);
        return $crud;
    }
    public function read()
    {
        
    }
    public function update()
    {
        # code...
    }

    public function delete()
    {
        # code...
    }
}