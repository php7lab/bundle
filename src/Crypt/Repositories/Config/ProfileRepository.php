<?php

namespace PhpLab\Bundle\Crypt\Repositories\Config;

use PhpLab\Bundle\Crypt\Interfaces\Repositories\ProfileRepositoryInterface;
use PhpLab\Core\Domain\Helpers\EntityHelper;
use PhpLab\Core\Enums\Measure\TimeEnum;
use PhpLab\Bundle\Crypt\Entities\JwtProfileEntity;
use PhpLab\Bundle\Crypt\Entities\KeyEntity;
use PhpLab\Core\Libs\Env\DotEnvHelper;

class ProfileRepository implements ProfileRepositoryInterface
{

    public function oneByName(string $profileName)
    {
        $prifile = DotEnvHelper::get('jwt.profiles.' . $profileName);
        $keyEntity = new KeyEntity;
        EntityHelper::setAttributes($keyEntity, $prifile['key']);
        $profileEntity = new JwtProfileEntity;
        $profileEntity->name = $profileName;
        $profileEntity->key = $keyEntity;
        $profileEntity->life_time = $prifile['life_time'] ?? TimeEnum::SECOND_PER_YEAR;
        return $profileEntity;
    }

}