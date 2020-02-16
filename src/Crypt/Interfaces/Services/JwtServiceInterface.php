<?php

namespace PhpLab\Bundle\Crypt\Interfaces\Services;

use PhpLab\Bundle\Crypt\Entities\JwtEntity;

interface JwtServiceInterface
{

    public function sign(JwtEntity $jwtEntity, string $profileName): string;
    public function verify(string $token, string $profileName): JwtEntity;
    public function decode(string $token);
    public function setProfiles($profiles);

}
