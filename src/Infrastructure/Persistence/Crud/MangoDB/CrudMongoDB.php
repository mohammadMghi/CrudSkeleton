<?php
namespace App\Infrastructure\Persistence\Crud\MangoDB;

 
use App\Domain\Crud\Repository\CrudRepository;
use App\Domain\Helper\Traits\HelperInfra;
use App\Domain\Model\Crud;
use App\Domain\User\User;
use App\Infrastructure\db\MongoDB;

class CrudMongoDB extends MongoDB implements CrudRepository{
    use HelperInfra;
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
    public function read(string $username) : Crud
    {
        $crud = $this->usersCollection->findOne(['username' =>$username]);
        $this->isEmptyCrud($crud);
        $crud = $this->setCrud($crud);
        
        return $crud;
    }
    public function update(Crud $crud) : Crud
    {
        # code...
    }

    public function delete($id) : bool
    {
        # code...
    }
}