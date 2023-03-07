<?php

namespace Tustin\CodLeague;

use Tustin\Haste\AbstractClient;
use Tustin\CodLeague\Models\MatchDetail;
use GuzzleHttp\Client as GuzzleHttpClient;

class Client extends AbstractClient
{
    public function __construct(array $options = [])
    {
        $options['base_uri'] = 'https://cdl-other-services.abe-arsfutura.com/production/v2/';
        $options['headers'] = array_merge($options['headers'] ?? [], [
            'Accept' => 'application/json',
            'sec-ch-ua-platform' => 'Android',
            'Sec-Fetch-Site' => 'cross-site',
            'Sec-Fetch-Mode' => 'cors',
            'Sec-Fetch-Dest' => 'empty',
            'x-origin' => 'callofdutyleague.com',
            'User-Agent' => 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Mobile Safari/537.36 Edg/110.0.1587.63'
        ]);

        parent::__construct($options);
    }

    public function match(string $matchId): MatchDetail
    {
        return new MatchDetail($this, $matchId);
    }

    public function getHttpClient(): GuzzleHttpClient
    {
        return $this->httpClient;
    }
}
