<?php

namespace PhpLab\Bundle\Crypt\Helpers;

class JwtSegmentHelper
{

    public static function encodeSegment($data)
    {
        return SafeBase64Helper::encode(JwtJsonHelper::encode($data));
    }

    public static function decodeSegment($data)
    {
        return JwtJsonHelper::decode(SafeBase64Helper::decode($data));
    }

}
