<?php
namespace StringUtilsLib\Tests;

use StringUtilsLib\StringUtils;
use PHPUnit\Framework\TestCase;

require "../vendor/autoload.php";
class StringUtilsLibTest extends TestCase
{
    public function testBracketCheckerWithEmptyLine(): void
    {
        $this->assertTrue(StringUtils::checkBracketInLine(""));
    }

    public function testBracketCheckerWithCorrectBrackets(): void
    {
        $this->assertTrue(true, StringUtils::checkBracketInLine("()"));
        $this->assertTrue(true, StringUtils::checkBracketInLine("(())"));
    }

    public function testBracketCheckerWithIncorrectBrackets(): void
    {
        $this->assertFalse(false, StringUtils::checkBracketInLine(")("));
        $this->assertFalse(false, StringUtils::checkBracketInLine(")"));
        $this->assertFalse(false, StringUtils::checkBracketInLine("("));
        $this->assertFalse(false, StringUtils::checkBracketInLine("())("));
        $this->assertFalse(false, StringUtils::checkBracketInLine("())"));
    }

    public function testBracketCheckerWithIncorrectCharactersInLine(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        StringUtils::checkBracketInLine("sometext()");
    }
}