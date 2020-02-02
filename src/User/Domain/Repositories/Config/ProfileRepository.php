<?php

namespace PhpLab\Bundle\User\Domain\Repositories\Config;

use PhpLab\Core\Enums\TimeEnum;
use PhpLab\Bundle\Crypt\Entities\JwtProfileEntity;
use PhpLab\Bundle\Crypt\Entities\KeyEntity;

class ProfileRepository
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