<?php

namespace MyGames;

use MyGames\Player\Computer;
use MyGames\Player\Human;
use MyGames\Rules\RockPaperScissors;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testPlayOneMove()
    {
        $this->expectOutputString(str_repeat("[R, P, S] ?\n> \n", 2));

        $mock = $this->createPartialMock(Human::class, ['getInput']);
        $mock->expects($this->exactly(2))
            ->method('getInput')
            ->willReturn('R');

        $game = new Game(new RockPaperScissors(), $mock, $mock);
        $this->assertSame(0, $game->playOneMove());
    }
    protected function playProvider(): array
    {
        return [
            '0/4 win 4/4 lose' => [[-1, -1, -1, -1], -4],
            '4/4 win 0/4 lose' => [[1, 1, 1, 1], 4],
            '2/4 win 2/4 lose 2 nul' => [[-1, 0, 0, -1], -2],
            '0/4 win 0/4 lose 4 nul' => [[0, 0, 0, 0], 0],
            '2/5 win 1/5 lose 1 nul' => [[1, 0, -1, 1], 1],
        ];
    }


    /**
     * @dataProvider playProvider
     * @param array $set
     * @param int $finalScore
     */
    public function testPlay(array $set, int $finalScore): void
    {
        $rules = $this->getMockBuilder(RockPaperScissors::class)
            ->enableOriginalConstructor()
            ->onlyMethods(['compare'])
            ->getMock();

        $rules->method('compare')
            ->will($this->onConsecutiveCalls(...$set));

        $game = new Game($rules, new Computer('ordi'), new Computer('AlBOTor'));
        $game->play(count($set));

        $this->assertSame($finalScore, $game->getScore());
    }
    protected function winnerProvider(): array
    {
        return [
            'player1 win all rounds' => [[1,1,1,1,1,1,1,1], '1'],
            'player1 lose all rounds' => [[-1,-1,-1,-1], '2'],
            'draw will win player 1' => [[1,1,-1,-1], '1'],
            'player1 win 4 rounds and player2 win 2 rounds (not ordered)' => [[1,1,-1,-1,1,1], '1'],
            'player1 win 2 rounds and player2 win 3 rounds (not ordered)' => [[1,-1,1,-1,-1], '2'],
        ];
    }
    /**
     * @dataProvider winnerProvider
     * @param array $playSet the array set of compare play results
     * @param string $winnerName the name of the winner
     */
    public function testWinner(array $playSet, string $winnerName): void
    {
        $rules = $this->getMockBuilder(RockPaperScissors::class)
            ->enableOriginalConstructor()
            ->onlyMethods(['compare'])
            ->getMock();

        $rules->method('compare')
            ->will($this->onConsecutiveCalls(...$playSet));

        $game = new Game($rules, new Computer('1'), new Computer('2'));
        $game->play(count($playSet));
        $this->assertSame($winnerName, $game->winner()->getName());
    }
}
