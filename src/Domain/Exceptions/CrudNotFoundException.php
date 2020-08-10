<?php
declare(strict_types=1);

namespace App\Domain\Model\Exceptions;

use App\Domain\DomainException\DomainRecordNotFoundException;

class CrudNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Crud you requested does not exist.';
}
