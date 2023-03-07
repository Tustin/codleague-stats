<?php

namespace Tustin\CodLeague\Models;

use DateTime;
use Iterator;
use Carbon\Carbon;
use Tustin\CodLeague\Client;
use Tustin\CodLeague\Enums\MatchStatus;

class MatchDetail extends ApiModel
{
    public function __construct(Client $client, private int $matchId)
    {
        parent::__construct($client);
    }

    /**
     * Gets the home team.
     */
    public function homeTeam(): Team
    {
        return new Team($this->pluck('matchData.matchExtended.homeTeamCard'));
    }

    /**
     * Gets the away team.
     */
    public function awayTeam(): Team
    {
        return new Team($this->pluck('matchData.matchExtended.awayTeamCard'));
    }

    /**
     * Gets the start time of the match.
     */
    public function playTime(): DateTime
    {
        return Carbon::parse($this->pluck('matchData.matchExtended.match.playTime'));
    }

    /**
     * Gets the status of the match.
     */
    public function status(): MatchStatus
    {
        return MatchStatus::from($this->pluck('matchData.matchExtended.match.status'));
    }

    /**
     * Gets the VOD link for the match.
     */
    public function vod(): string
    {
        return $this->pluck('matchData.matchExtended.match.vodLink');
    }

    /**
     * Gets the match's games.
     */
    public function games(): Iterator
    {
        foreach ($this->pluck('matchData.matchGamesExtended') as $game) {
            yield new Game($this, $game);
        }
    }

    /**
     * Gets the players in the match.
     */
    public function players(): Iterator
    {
        $players = array_merge(
            $this->pluck('matchData.matchStats.overall.hostTeam'),
            $this->pluck('matchData.matchStats.overall.guestTeam')
        );

        foreach ($players as $player) {
            yield new Player($player);
        }
    }

    /**
     * Gets the match ID.
     */
    public function matchId(): string
    {
        return $this->matchId;
    }

    public function fetch(): mixed
    {
        return $this->get('content-types/match-detail/bltd79e337aca601012', [
            'locale' => 'en-us',
            'options' => json_encode(['id' => $this->matchId()])
        ])->data;
    }
}
