<?php

declare(strict_types=1);

namespace MyGames\Player;

use MyGames\Rules\IRules;
use PHPUnit\Framework\TestCase;

class HumanTest extends TestCase
{
    protected Human $human;
    protected function setUp(): void
    {
        $this->human = new Human('test');
    }
    public function testShowPossibilities(): void
    {
        $this->assertSame('Rock Paper Scissors ', $this->human->showPossibilities(['Rock','Paper','Scissors']));
    }
    public function testGetInput(): void
    {
        $mock = $this->createPartialMock(Human::class, ['getInput']);
        $mock->method('getInput')->willReturn('Rock');
        $this->expectOutputString('Rock');
        print $mock->getInput();
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
     * @return void
     * @dataProvider moveProvider
     */
    public function testPlayOneMove(string $gesture, string $expected): void
    {
        $rules = $this->getMockForAbstractClass(IRules::class, mockedMethods: ['getGestures']);
        $mock = $this->createPartialMock(Computer::class, ['playOneMove']);
        $mock->method('playOneMove')->willReturn($gesture);
        $this->assertSame($expected, $mock->playOneMove($rules));
    }
}
