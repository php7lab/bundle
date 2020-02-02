<?php

namespace PhpLab\Bundle\Crypt\Libs;

use php7extension\psr\container\BaseContainer;
//use PhpLab\Core\Legacy\Traits\ClassAttribute\MagicSetTrait;
use PhpLab\Bundle\Crypt\Entities\JwtProfileEntity;
use PhpLab\Bundle\Crypt\Helpers\ConfigProfileHelper;

class ProfileContainer extends BaseContainer
{

    //use MagicSetTrait;

    public function setProfiles($profiles)
    {

        $this->setDefinitions($profiles);
    }

    protected function prepareDefinition($component)
    {
        $component = parent::prepareDefinition($component);
        $component['class'] = JwtProfileEntity::class;
        $component = ConfigProfileHelper::prepareDefinition($component);
        return $component;
    }

}
