<?php
namespace App\Infrastructure\db;

use App\Domain\User\Repository\CrudRepository;
use MongoDB\Client;

abstract class MongoDB {
    public $db;
    public function mongoConnection()
    {
       $connection =new Client("mongodb://localhost:27017");

       $this->db = $connection->user;
    }
    
}