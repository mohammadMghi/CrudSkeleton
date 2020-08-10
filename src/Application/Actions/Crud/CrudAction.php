<?php
declare(strict_types=1);

namespace App\Application\Actions\Crud;

use App\Application\Actions\Action;
use App\Domain\Crud\Repository\CrudRepository;
use App\Domain\User\UserRepository;
use Psr\Log\LoggerInterface;

abstract class CrudAction extends Action
{

    /**
     * @var UserRepository
     * @var CrudRepository
     */
    protected CrudRepository $crudRepository;

    /**
     * @param LoggerInterface $logger
     * @param CrudRepository  $crudRepository
     */
    public function __construct(LoggerInterface $logger, CrudRepository $crudRepository)
    {
        parent::__construct($logger);
    
        $this->crudRepository = $crudRepository;
        $this->crudRepository->connection();
    }
}
