<?php

declare(strict_types=1);

namespace Tests\MyGames\Rules;

use PHPUnit\Framework\TestCase;
use MyGames\Rules\RockPaperScissors;

class RockPaperScissorsTest extends TestCase
{
    public RockPaperScissors $rockPaperScissors;
    protected function setUp(): void
    {
        $this->rockPaperScissors = new RockPaperScissors();
    }
    public function testGetGesture(): void
    {
        $this->assertSame(['R','P','S'], $this->rockPaperScissors->getGestures());
    }
    public function compareProvider(): array
    {
        return [
            "Rock vs Paper" => ['R','P',-1],
            "Rock vs Rock" => ['R','R',0],
            "Rock vs Scissor" => ['R','S',1],
            "Paper vs Paper" => ['P','P',0],
            "Paper vs Rock" => ['P','R',1],
            "Paper vs Scissor" => ['P','S',-1],
            "Scissor vs Paper" => ['S','P',1],
            "Scissor vs Rock" => ['S','R',-1],
            "Scissor vs Scissor" => ['S','S',0],
        ];
    }

    /**
     * @param string $gesture1
     * @param string $gesture2
     * @param int $expected
     * @dataProvider compareProvider
     * @return void
     */
    public function testCompare(string $gesture1, string $gesture2, int $expected): void
    {
        $this->assertSame($expected, $this->rockPaperScissors->compare($gesture1, $gesture2));
    }
    public function checkProvider(): array
    {
        return [
            "'P' should be true" => ['P', true],
            "'S' should be true" => ['S', true],
            "'R' should be true" => ['R', true],
            "'Z' should be false" => ['Z', false],
        ];
    }

    /**
     * @param string $gesture1
     * @param bool $expected
     * @dataProvider checkProvider
     * @return void
     */
    public function testCheckingGesture(string $gesture1, bool $expected): void
    {
        $this->assertSame($expected, $this->rockPaperScissors->checkGesture($gesture1));
    }
}
