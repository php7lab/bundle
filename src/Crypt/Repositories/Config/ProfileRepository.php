<?php

namespace PhpLab\Bundle\Crypt\Repositories\Config;

use PhpLab\Bundle\Crypt\Interfaces\Repositories\ProfileRepositoryInterface;
use PhpLab\Core\Enums\Measure\TimeEnum;
use PhpLab\Bundle\Crypt\Entities\JwtProfileEntity;
use PhpLab\Bundle\Crypt\Entities\KeyEntity;

class ProfileRepository implements ProfileRepositoryInterface
{

    public function oneByName(string $profileName)
    {
        $profileEntity = new JwtProfileEntity;
        $profileEntity->name = $profileName;
        $profileEntity->key = new KeyEntity;
        $profileEntity->key->private = 'W4PpvVwI82Rfl9fl2R9XeRqBI0VFBHP3';
        $profileEntity->life_time = TimeEnum::SECOND_PER_YEAR;
        return $profileEntity;
    }

}