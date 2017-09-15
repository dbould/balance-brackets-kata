<?php

namespace Test;

use BalanceBrackets\BalanceBrackets;
use PHPUnit\Framework\TestCase;

class BalanceBracketsTest extends TestCase
{
    public function testSimpleBracketPass()
    {
        $balanceBrackets = new BalanceBrackets();

        $testCase = "[]";

        $actual = $balanceBrackets->checkIsBalanced($testCase);
        $expected = true;

        $this->assertEquals($expected, $actual);
    }

    public function testSimpleBracketPass2()
    {
        $balanceBrackets = new BalanceBrackets();

        $testCase = "()";

        $actual = $balanceBrackets->checkIsBalanced($testCase);
        $expected = true;

        $this->assertEquals($expected, $actual);
    }

    public function testSimpleBracketPass3()
    {
        $balanceBrackets = new BalanceBrackets();

        $testCase = "{}";

        $actual = $balanceBrackets->checkIsBalanced($testCase);
        $expected = true;

        $this->assertEquals($expected, $actual);
    }

    public function testSimpleBracketFail()
    {
        $balanceBrackets = new BalanceBrackets();

        $testCase = "[[";

        $actual = $balanceBrackets->checkIsBalanced($testCase);
        $expected = false;

        $this->assertEquals($expected, $actual);
    }

    public function testSimpleBracketFail2()
    {
        $balanceBrackets = new BalanceBrackets();

        $testCase = "((";

        $actual = $balanceBrackets->checkIsBalanced($testCase);
        $expected = false;

        $this->assertEquals($expected, $actual);
    }

    public function testSimpleBracketFail3()
    {
        $balanceBrackets = new BalanceBrackets();

        $testCase = "{{";

        $actual = $balanceBrackets->checkIsBalanced($testCase);
        $expected = false;

        $this->assertEquals($expected, $actual);
    }

    public function testAlternativeSimpleBracketFail()
    {
        $balanceBrackets = new BalanceBrackets();

        $testCase = "{{{";

        $actual = $balanceBrackets->checkIsBalanced($testCase);
        $expected = false;

        $this->assertEquals($expected, $actual);
    }

    public function testTwoBracketPass()
    {
        $balanceBrackets = new BalanceBrackets();

        $testCase = "{}{}";

        $actual = $balanceBrackets->checkIsBalanced($testCase);
        $expected = true;

        $this->assertEquals($expected, $actual);
    }

    public function testTwoBracketFail()
    {
        $balanceBrackets = new BalanceBrackets();

        $testCase = "{}{";

        $actual = $balanceBrackets->checkIsBalanced($testCase);
        $expected = false;

        $this->assertEquals($expected, $actual);
    }

    public function testTwoTypesFail()
    {
        $balanceBrackets = new BalanceBrackets();

        $testCase = "{}(]";

        $actual = $balanceBrackets->checkIsBalanced($testCase);
        $expected = false;

        $this->assertEquals($expected, $actual);
    }

    public function testThreeTypesPass()
    {
        $balanceBrackets = new BalanceBrackets();

        $testCase = "{}[]()";

        $actual = $balanceBrackets->checkIsBalanced($testCase);
        $expected = true;

        $this->assertEquals($expected, $actual);
    }

    public function testTwoTypesEnclosedPass()
    {
        $balanceBrackets = new BalanceBrackets();

        $testCase = "[()]";

        $actual = $balanceBrackets->checkIsBalanced($testCase);
        $expected = true;

        $this->assertEquals($expected, $actual);
    }

    public function testThreeTypesEnclosedPass()
    {
        $balanceBrackets = new BalanceBrackets();

        $testCase = "{[()]}";

        $actual = $balanceBrackets->checkIsBalanced($testCase);
        $expected = true;

        $this->assertEquals($expected, $actual);
    }

    public function testThreeTypesEnclosedFail()
    {
        $balanceBrackets = new BalanceBrackets();

        $testCase = "{[()]]";

        $actual = $balanceBrackets->checkIsBalanced($testCase);
        $expected = false;

        $this->assertEquals($expected, $actual);
    }

    public function testThreeTypesEnclosedFail2()
    {
        $balanceBrackets = new BalanceBrackets();

        $testCase = "{[()]}[";

        $actual = $balanceBrackets->checkIsBalanced($testCase);
        $expected = false;

        $this->assertEquals($expected, $actual);
    }
}