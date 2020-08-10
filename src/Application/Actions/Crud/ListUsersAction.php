<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Application\Actions\Crud\CrudAction;
use Psr\Http\Message\ResponseInterface as Response;

class ListCrudAction extends CrudAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $crud = $this->userRepository->findAll();

        $this->logger->info("Cruds list was viewed.");

        return $this->respondWithData($crud);
    }
}
