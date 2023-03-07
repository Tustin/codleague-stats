<?php

namespace Tustin\CodLeague\Enums;


enum MatchStatus: string
{
    case Completed = 'COMPLETED';
    case InProgress = 'IN_PROGRESS'; // TODO: Check this
}
