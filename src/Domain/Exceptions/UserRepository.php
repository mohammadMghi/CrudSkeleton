<?php
declare(strict_types=1);

namespace App\Domain\Model\Crud;

use App\Domain\Model\Crud;

interface CrudRepository
{
    /**
     * @return Crud[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Crud
     * @throws CrudNotFoundException
     */
    public function findCrudOfId(int $id): Crud;
}
