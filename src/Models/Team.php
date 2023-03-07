<?php

namespace Tustin\CodLeague\Models;

class Team
{
    public function __construct(public array $teamDetails)
    {
    }

    public function id(): string
    {
        return $this->teamDetails['id'];
    }

    public function name(): string
    {
        return $this->teamDetails['name'];
    }

    public function abbreviation(): string
    {
        return $this->teamDetails['abbreviation'];
    }

    public function lightLogo(): string
    {
        return $this->teamDetails['lightLogoUrl'];
    }

    public function darkLogo(): string
    {
        return $this->teamDetails['darkLogoUrl'];
    }
}
