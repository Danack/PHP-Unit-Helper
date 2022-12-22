<?php

declare(strict_types = 1);

namespace Danack\PHPUnitHelper;

/**
 * Used to convert to PHPUnits expected format.
 */

/**
 * @param string $string A string that would be used as template for sprintf
 * @return string The string converted to a regexp
 */
function templateStringToRegExp(string $string): string
{
    $string = preg_quote($string, '#');

    $replacements = [
        // a string of characters
        '%s' => '.*',   // strings can be empty, so *
        // decimal (integer) number (base 10)
        '%d' => '[+-]?\d+',  // numbers can't be empty so +

        // todo
        // character
        // %c

        // todo
        // exponential floating-point number
        // %e

        // floating-point number
        '%f' => "[+-]?([0-9]*[.])?[0-9]+",

        // integer (base 10)
        '%i' => '[+-]?\d+',

        // octal number (base 8)
        '%o' => "[+-]?([0-7])+",

        // todo
        // unsigned decimal (integer) number
        // %u

        // number in hexadecimal (base 16)
        '%x' =>  '[[:xdigit:]]+'
    ];

    $string = str_replace(
        array_keys($replacements),
        array_values($replacements),
        $string
    );

    return '#' . $string . '#iu';
}
