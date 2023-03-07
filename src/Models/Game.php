<?php

namespace Tustin\CodLeague\Models;

class Game
{
    public function __construct(private MatchDetail $match, public array $gameDetails)
    {
    }

    public function match()
    {
        return $this->match;
    }

    public function number(): int
    {
        return $this->gameDetails['number'];
    }

    public function id(): int
    {
        return $this->gameDetails['id'];
    }

    public function map(): string
    {
        return $this->gameDetails['map'];
    }

    public function mode(): string
    {
        return $this->gameDetails['mode'];
    }

    public function mapImage(): string
    {
        return $this->gameDetails['gameMap']['desktopImage']['src'];
    }
}
