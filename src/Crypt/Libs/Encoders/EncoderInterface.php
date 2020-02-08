<?php

namespace PhpLab\Bundle\Crypt\Libs\Encoders;

interface EncoderInterface
{

    public function encode($data);
    public function decode($encodedData);

}