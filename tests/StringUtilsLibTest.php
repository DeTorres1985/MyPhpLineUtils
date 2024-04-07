<?php

namespace BracketChecker\Tests;

use StringUtilsLib\StringUtils;
use PHPUnit\Framework\TestCase;

class StringUtilsLibTest extends TestCase
{
    public function testBracketCheckerWithEmptyLine(): void
    {
        $this->assertEquals(true, StringUtils::checkBracketInLine(""));
    }

    public function testBracketCheckerWithCorrectBrackets(): void
    {
        $this->assertEquals(true, StringUtils::checkBracketInLine("()"));
        $this->assertEquals(true, StringUtils::checkBracketInLine("(())"));
    }

    public function testBracketCheckerWithIncorrectBrackets(): void
    {
        $this->assertEquals(false, StringUtils::checkBracketInLine(")("));
        $this->assertEquals(false, StringUtils::checkBracketInLine(")"));
        $this->assertEquals(false, StringUtils::checkBracketInLine("("));
        $this->assertEquals(false, StringUtils::checkBracketInLine("())("));
        $this->assertEquals(false, StringUtils::checkBracketInLine("())"));
    }

    public function testBracketCheckerWithIncorrectCharactersInLine(): void
    {
        $this->expectException(InvalidArgumentException::class);
        StringUtils::checkBracketInLine("sometext()");
    }
}