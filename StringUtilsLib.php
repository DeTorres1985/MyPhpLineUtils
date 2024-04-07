<?php

namespace StringUtilsLib;

use http\Exception\InvalidArgumentException;

class StringUtils
{
    public static function checkBracketInLine(string $line): string
    {
        self::checkLine($line);

        $length = strlen($line);
        if ($length == 0) {
            return true;
        }

        $leftBracket = '{';
        $rightBracket = '}';
        $openedBrackets = 0;

        for ($i = 0; $i < $length; $i++) {
            if ($line[$i] == $leftBracket) {
                $openedBrackets++;
            } elseif ($line[$i] == $rightBracket) {
                $openedBrackets--;
            }
            if ($openedBrackets < 0) {
                return false;
            }
        }
        return $openedBrackets == 0;
    }

    private static function checkLine(string $line): void
    {
        $str = "Hello, world!";
        $pattern = '/^[ ,()\n\t\r]+$/';

        if (strlen($line) != 0 && !preg_match($pattern, $str)) {
            throw new InvalidArgumentException();
        }
    }
}