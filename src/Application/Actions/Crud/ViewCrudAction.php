<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Application\Actions\Crud\CrudAction;
use Psr\Http\Message\ResponseInterface as Response;

class ViewCrudAction extends CrudAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $crudId = (int) $this->resolveArg('id');
        $crud = $this->userRepository->findUserOfId($crudId);

        $this->logger->info("User of id `${crudId}` was viewed.");

        return $this->respondWithData($crud);
    }
}
