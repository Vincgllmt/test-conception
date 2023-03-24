<?php

declare(strict_types=1);

namespace MyGames\Player;

use MyGames\Rules\IRules;
use PHPUnit\Framework\TestCase;

class ComputerTest extends TestCase
{
    protected Computer $computer;
    protected function setUp(): void
    {
        $this->computer = new Computer("Ordi");
    }
    public function moveProvider(): array
    {
        return [
            "mock R" => ['R','R'],
            "mock P" => ['P','P'],
            "mock S" => ['S','S'],
        ];
    }

    /**
     * @param string $gesture
     * @param string $expected
     * @dataProvider moveProvider
     * @return void
     */
    public function testPlayOneMove(string $gesture, string $expected, IRules $rules): void
    {
        $mock = $this->createPartialMock(Computer::class, ['playOneMove']);
        $mock->method('playOneMove')->willReturn($gesture);
        $this->assertSame($expected, $mock->playOneMove($rules));
    }
}
