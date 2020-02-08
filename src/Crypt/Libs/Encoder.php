<?php

namespace PhpLab\Bundle\Crypt\Libs;

use Illuminate\Support\Collection;
use PhpLab\Bundle\Crypt\Libs\Encoders\EncoderInterface;
use PhpLab\Core\Helpers\InstanceHelper;

class Encoder implements EncoderInterface
{

    private $encoderCollection;

    public function __construct(Collection $encoderCollection)
    {
        $this->encoderCollection = $encoderCollection;
    }

    public function encode($data) {
        $encoders = $this->encoderCollection->all();
        foreach ($encoders as $encoderClass) {
            /** @var EncoderInterface $encoderInstance */
            $encoderInstance = InstanceHelper::ensure($encoderClass);
            $data = $encoderInstance->encode($data);
        }
        return $data;
    }

    public function decode($data) {
        $encoders = $this->encoderCollection->all();
        $encoders = array_reverse($encoders);
        foreach ($encoders as $encoderClass) {
            /** @var EncoderInterface $encoderInstance */
            $encoderInstance = InstanceHelper::ensure($encoderClass);
            $data = $encoderInstance->decode($data);
        }
        return $data;
    }

}
