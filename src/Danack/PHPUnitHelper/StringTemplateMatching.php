<?php

declare(strict_types = 1);

namespace Danack\PHPUnitHelper;

use PHPUnit\Framework\TestCase;

/** @mixin TestCase */
trait StringTemplateMatching
{
    /**
     * @param string $templateString A template string for printf e.g. "Hello %s"
     * @param string $actualString The string to test to see if it matches e.g. "Hello John"
     */
    public function assertStringMatchesTemplateString(string $templateString, string $actualString): void
    {
        $regExp = templateStringToRegExp($templateString);
        $this->assertMatchesRegularExpression($regExp, $actualString);
    }

    /**
     * @param string $templateString A template string for printf e.g. "Hello %s"
     */
    public function expectExceptionMessageMatchesTemplateString(string $templateString): void
    {
        $regexp = templateStringToRegExp($templateString);
        $this->expectExceptionMessageMatches($regexp);
    }
}
