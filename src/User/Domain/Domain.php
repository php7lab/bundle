<?php

namespace PhpLab\Bundle\User\Domain;

use PhpLab\Core\Domain\Interfaces\DomainInterface;

class Domain implements DomainInterface
{

    public function getName()
    {
        return 'user';
    }

}