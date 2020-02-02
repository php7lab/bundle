<?php

namespace PhpLab\Bundle\Crypt\Entities;

use PhpLab\Bundle\Crypt\Enums\JwtAlgorithmEnum;

/**
 * Class JwtHeaderEntity
 * @package PhpLab\Bundle\Crypt\Entities
 *
 * @property $typ string
 * @property $alg string
 * @property $kid string
 */
class JwtHeaderEntity
{

    public $typ = 'JWT';
    public $alg = JwtAlgorithmEnum::HS256;
    public $kid;

}
