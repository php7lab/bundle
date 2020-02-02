<?php

namespace PhpLab\Bundle\User\Domain\Repositories\Eloquent;

use PhpLab\Eloquent\Db\Base\BaseEloquentCrudRepository;
use PhpLab\Bundle\User\Domain\Entities\Identity;
use PhpLab\Bundle\User\Domain\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseEloquentCrudRepository implements UserRepositoryInterface
{

    protected $tableName = 'fos_user';

    public function getEntityClass(): string
    {
        return Identity::class;
    }
}