<?php

namespace PhpLab\Bundle\Crypt\Libs\Encoders;

use PhpLab\Bundle\Crypt\Helpers\SafeBase64Helper;

class Base64Encoder implements EncoderInterface
{

    public function encode($data)
    {
        return SafeBase64Helper::encode($data);
    }

    public function decode($encodedData)
    {
        return SafeBase64Helper::decode($encodedData);
    }

}
