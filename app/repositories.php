<?php
declare(strict_types=1);

use App\Domain\Crud\Repository\CrudRepository;
use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\Crud\MangoDB\CrudMongoDB;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our CrudRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
        CrudRepository::class => \DI\autowire(CrudMongoDB::class)
    ]);
};
