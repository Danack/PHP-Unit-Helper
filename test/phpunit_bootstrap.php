<?php

namespace DanackTest;

use Danack\PHPUnitHelper\StringTemplateMatching;

class DJaHackyShit
{
    use StringTemplateMatching;

    private ?string $regexp = null;

    private ?string $message = null;

    public function assertRegExp(string $regExp, string $message): void
    {
        $this->regExp = $regExp;
        $this->message = $message;
    }

    public function expectExceptionMessageMatches(string $regExp): void
    {
        $this->regExp = $regExp;
    }

}