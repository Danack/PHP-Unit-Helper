<?php

declare(strict_types = 1);


namespace DanackTest;

use PHPUnit\Framework\TestCase;
use function Danack\PHPUnitHelper\templateStringToRegExp;

/**
 * @coversNothing
 *
 */
class TemplateStringToRegExpTest extends TestCase
{
    public function providesTemplateStringToRegExp()
    {
        yield ["Hello there %s!", ['John']];
        // delimiter in param
        yield ["Hello there %s!", ['John#']];
        // delimiter in template
        yield ["Hello there %s #!", ['John']];

        // decimal numbers
        yield ["The number is %d!", [5]];
        yield ["The number is %d!", [-5]];

        // integer numbers
        yield ["The number is %d!", [5]];
        yield ["The number is %d!", [-5]];


        // hex numbers
        yield ["The hex number is %x!", [5]];
        yield ["The hex number is %x!", [25]];
        yield ["The number is %x!", [-5]];

        // octal numbers
        yield ["The oct number is %o!", [5]];
        yield ["The oct number is %o!", [25]];
        yield ["The number is %o!", [-5]];
    }

    /**
     * @dataProvider providesTemplateStringToRegExp
     * @covers \Danack\PHPUnitHelper\templateStringToRegExp
     * @param string $input
     * @param $expectedOutput
     */
    public function testTemplateStringToRegExp(string $templateString, $paramsToTry)
    {
        $regexp = templateStringToRegExp($templateString);
        $output = sprintf($templateString, ...$paramsToTry);
        $result = preg_match($regexp, $output);

        $this->assertNotFalse($result, "generated regexp failed run.");
        $this->assertSame(1, $result, "generated regexp failed to match. Output was " . $output);
    }
}
