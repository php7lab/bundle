<?php

namespace PhpLab\Bundle\Crypt\Entities;

use PhpLab\Bundle\Crypt\Enums\EncryptAlgorithmEnum;

/**
 * Class ConfigEntity
 * @package PhpLab\Bundle\Crypt\Entities
 *
 * @property KeyEntity $key
 * @property string $algorithm
 */
class ProfileEntity
{

    public $key;
    public $algorithm = EncryptAlgorithmEnum::SHA256;


    public function fieldType()
    {
        return [
            'key' => KeyEntity::class,
        ];
    }
}
