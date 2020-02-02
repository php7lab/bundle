<?php

namespace PhpLab\Bundle\Crypt\Strategies\Func;

use php7extension\bundle\account\domain\v3\helpers\LoginTypeHelper;
use PhpLab\Core\Patterns\Strategy\Base\BaseStrategyContextHandlers;
use PhpLab\Bundle\Crypt\Enums\EncryptFunctionEnum;
use PhpLab\Bundle\Crypt\Strategies\Func\Handlers\EmailStrategy;
use PhpLab\Bundle\Crypt\Strategies\Func\Handlers\HandlerInterface;
use PhpLab\Bundle\Crypt\Strategies\Func\Handlers\HmacStrategy;
use PhpLab\Bundle\Crypt\Strategies\Func\Handlers\LoginStrategy;
use PhpLab\Bundle\Crypt\Strategies\Func\Handlers\Many;
use PhpLab\Bundle\Crypt\Strategies\Func\Handlers\ManyToMany;
use PhpLab\Bundle\Crypt\Strategies\Func\Handlers\One;
use PhpLab\Bundle\Crypt\Strategies\Func\Handlers\OpenSslStrategy;
use PhpLab\Bundle\Crypt\Strategies\Func\Handlers\PhoneStrategy;
use PhpLab\Bundle\Crypt\Strategies\Func\Handlers\TokenStrategy;

/**
 * @property-read HandlerInterface $strategyInstance
 */
class FuncContext extends BaseStrategyContextHandlers
{

    public function getStrategyDefinitions()
    {
        return [
            EncryptFunctionEnum::OPENSSL => OpenSslStrategy::class,
            EncryptFunctionEnum::HASH_HMAC => HmacStrategy::class,
        ];
    }

    public function sign($msg, $algorithm, $key)
    {
        return $this->getStrategyInstance()->sign($msg, $algorithm, $key);
    }

    public function verify($msg, $algorithm, $key, $signature)
    {
        return $this->getStrategyInstance()->verify($msg, $algorithm, $key, $signature);
    }

}