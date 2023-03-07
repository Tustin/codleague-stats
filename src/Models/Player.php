<?php

namespace Tustin\CodLeague\Models;


class Player
{
    public array $playerStats;
    public function __construct(public array $playerDetails)
    {
        $this->playerStats = $this->playerDetails['stats'];
    }

    public function firstName(): string
    {
        return $this->playerDetails['firstName'];
    }

    public function lastName(): string
    {
        return $this->playerDetails['lastName'];
    }

    public function fullName(): string
    {
        return $this->firstName() . ' ' . $this->lastName();
    }

    public function alias(): string
    {
        return $this->playerDetails['alias'];
    }

    public function headshot(): string
    {
        return $this->playerDetails['headshot'];
    }

    /**
     * Gets the player's social network handles.
     * 
     * TODO: Make this return a collection of social network handles.
     */
    public function handles(): array
    {
        return $this->playerDetails['socialNetworkHandles'];
    }

    /**
     * Gets the average moving speed.
     */
    public function averageSpeed(): float
    {
        return (float) $this->playerStats['averageSpeed'];
    }


    /**
     * Gets the highest kill streak.
     */
    public function highestStreak(): int
    {
        return (int) $this->playerStats['highestStreak'];
    }

    /**
     * Gets the untraded kills.
     */
    public function untradedKills(): int
    {
        return (int) $this->playerStats['untradedKills'];
    }

    /**
     * Gets the untraded deaths.
     */
    public function untradedDeaths(): int
    {
        return (int) $this->playerStats['untradedDeaths'];
    }

    /**
     * Gets the traded kills.
     */
    public function tradedKills(): int
    {
        return (int) $this->playerStats['tradedKills'];
    }

    /**
     * Gets the traded deaths.
     */
    public function tradedDeaths(): int
    {
        return (int) $this->playerStats['tradedDeaths'];
    }

    /**
     * Gets the total damage taken.
     */
    public function damageTaken(): int
    {
        return (int) $this->playerStats['damageTaken'];
    }

    /**
     * Gets the total damage dealt (?).
     */
    public function damageHealed(): int
    {
        return (int) $this->playerStats['damageHealed'];
    }

    /**
     * Gets the amount of tacticals used.
     */
    public function tacticalsUsed(): int
    {
        return (int) $this->playerStats['tacticalsUsed'];
    }

    /**
     * Gets the amount of lethals used.
     */
    public function lethalsUsed(): int
    {
        return (int) $this->playerStats['lethalsUsed'];
    }

    /**
     * Gets the percentage of time the player was moving.
     * 
     * Not sure if this is based on time alive or game duration.
     */
    public function percentTimeMoving(): float
    {
        return (float) $this->playerStats['percentTimeMoving'];
    }

    /**
     * Gets the amount of time the player had dead silence active.
     */
    public function deadSilenceTime(): int
    {
        return (int) $this->playerStats['deadSilenceTime'];
    }

    /**
     * Gets the amount of hill time the player had.
     * 
     * I'm assuming this is just counting Hardpoint and not time inside a Control point.
     */
    public function hillTime(): int
    {
        return (int) $this->playerStats['hillTime'];
    }

    /**
     * Gets the amount of contested hill time the player had.
     */
    public function contestedHillTime(): int
    {
        return (int) $this->playerStats['contestedHillTime'];
    }

    /**
     * Gets the total kills the player had.
     */
    public function totalKills(): int
    {
        return (int) $this->playerStats['totalKills'];
    }

    /**
     * Gets the total deaths the player had.
     */
    public function totalDeaths(): int
    {
        return (int) $this->playerStats['totalDeaths'];
    }

    /**
     * Gets the total assists the player had.
     */
    public function totalAssists(): int
    {
        return (int) $this->playerStats['totalAssists'];
    }

    /**
     * Gets the total score.
     */
    public function totalScore(): int
    {
        return (int) $this->playerStats['totalScore'];
    }

    /**
     * Gets the total shots fired.
     */
    public function totalShotsFired(): int
    {
        return (int) $this->playerStats['totalShotsFired'];
    }

    /**
     * Gets the total shots hit.
     */
    public function totalShotsHit(): int
    {
        return (int) $this->playerStats['totalShotsHit'];
    }

    /**
     * Gets the total shots to the head.
     */
    public function totalShotsHead(): int
    {
        return (int) $this->playerStats['totalShotsHead'];
    }

    /**
     * Gets the total amount of damage dealt.
     */
    public function totalDamageDealt(): int
    {
        return (int) $this->playerStats['totalDamageDealt'];
    }

    /**
     * Gets the total amount of damage dealt to teammates.
     */
    public function friendlyDamageDealt(): int
    {
        return (int) $this->playerStats['friendDamage'];
    }

    /**
     * Gets the total amount of time the player was alive.
     */
    public function totalTimeAlive(): int
    {
        return (int) $this->playerStats['totalTimeAlive'];
    }

    /**
     * Gets the total distance traveled.
     * 
     * Not sure if this is in meters or some other unit.
     */
    public function totalDistanceTraveled(): float
    {
        return (float) $this->playerStats['totalDistanceTraveled'];
    }

    /**
     * Gets the highest multi kill.
     */
    public function highestMultiKill(): int
    {
        return (int) $this->playerStats['highestMultiKill'];
    }

    /**
     * Gets the total amount of aces the player had.
     */
    public function totalAces(): int
    {
        return (int) $this->playerStats['totalAces'];
    }

    /**
     * Gets the total amount of kills the player had while in the victim's field of view (?).
     */
    public function totalInVictimFovKills(): int
    {
        return (int) $this->playerStats['totalInVictimFovKills'];
    }

    /**
     * Gets the total amount of kills the player had on player's defusing the bomb.
     */
    public function totalDefuserKills(): int
    {
        return (int) $this->playerStats['totalDefuserKills'];
    }

    /**
     * Gets the total amount of first bloods the player had.
     */
    public function totalFirstBloodKills(): int
    {
        return (int) $this->playerStats['totalFirstBloodKills'];
    }

    /**
     * Gets the total amount of long shot kills.
     */
    public function totalLongshotKills(): int
    {
        return (int) $this->playerStats['totalLongshotKills'];
    }

    /**
     * Gets the total amount of kills the player had on players planting the bomb.
     */
    public function totalPlanterKills(): int
    {
        return (int) $this->playerStats['totalPlanterKills'];
    }

    /**
     * Gets the total amount of kills the player had at point-blank range.
     */
    public function totalPointblankKills(): int
    {
        return (int) $this->playerStats['totalPointblankKills'];
    }

    /**
     * Gets the total amount of revenge kills the player had (killing the player who killed you).
     */
    public function totalRevengeKills(): int
    {
        return (int) $this->playerStats['totalRevengeKills'];
    }

    /**
     * Gets the total amount of kills the player had on players rotating.
     * 
     * Not sure how this is counted exactly. It might just be kills within the last 10 seconds of any given hill or something.
     * Or it might also be counting kills at the new hill while the old hill is still active.
     */
    public function totalRotationKills(): int
    {
        return (int) $this->playerStats['totalRotationKills'];
    }

    /**
     * Gets the total amount of kills the player had on players who were in the attacker's field of view.
     */
    public function totalInAttackerFovKills(): int
    {
        return (int) $this->playerStats['totalInAttackerFovKills'];
    }

    /**
     * Gets the total amount of kills the player had through walls.
     */
    public function totalWallbangKills(): int
    {
        return (int) $this->playerStats['totalWallbangKills'];
    }

    /**
     * Gets the amount of bombs planted.
     */
    public function bombsPlanted(): int
    {
        return (int) $this->playerStats['bombsPlanted'];
    }

    /**
     * Gets the amount of bombs defused.
     */
    public function bombsDefused(): int
    {
        return (int) $this->playerStats['bombsDefused'];
    }

    /**
     * Gets the amount of ninja defuses.
     * 
     * I guess this is counted when the bomb is defused while enemies are still alive.
     */
    public function sneakDefuses(): int
    {
        return (int) $this->playerStats['sneakDefuses'];
    }

    /**
     * Gets the total amount of objectives captured.
     */
    public function totalObjectivesCaptured(): int
    {
        return (int) $this->playerStats['totalObjectivesCaptured'];
    }

    /**
     * Gets the amount of tiers contributed to objectives.
     * 
     * e.g. If you are on a Control point when a tick is secured.
     * 
     */
    public function objectiveTiersContributed(): int
    {
        return (int) $this->playerStats['objectiveTiersContributed'];
    }

    /**
     * Gets the player's kill/death ratio.
     */
    public function kd(): float
    {
        return (float) $this->playerStats['killDeathRatio'];
    }
}
