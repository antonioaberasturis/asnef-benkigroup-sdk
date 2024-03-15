<?php

namespace Asnef\Benkigroup;

use Asnef\Benkigroup\Actions\ManagesConsult;
use Asnef\Benkigroup\Actions\ManagesConsultMonthlyInformation;
use Asnef\Benkigroup\Actions\ManagesConsultOperation;
use Asnef\Benkigroup\Actions\ManagesConsultTransaction;
use Asnef\Benkigroup\Actions\ManagesConsultValidation;
use Asnef\Benkigroup\Actions\ManagesFile;
use Asnef\Benkigroup\Actions\ManagesFileRecord;
use Asnef\Benkigroup\Actions\ManagesFileRecordHistory;
use Carbon\Carbon;
use GuzzleHttp\Client;

class Asnef
{
    use MakesHttpRequests;
    use ManagesConsult;
    use ManagesConsultTransaction;
    use ManagesConsultOperation;
    use ManagesConsultMonthlyInformation;
    use ManagesConsultValidation;
    use ManagesFile;
    use ManagesFileRecord;
    use ManagesFileRecordHistory;

    /** @var string */
    public $token;

    /** @var \GuzzleHttp\Client */
    public $client;

    public function __construct(string $token, string $baseUri = 'https://asnef.bnk.mobi/api/client/')
    {
        $this->token = $token;

        $this->client = new Client([
            'base_uri' => $baseUri,
            'http_errors' => false,
            'verify' => false,
            'headers' => [
                'Authorization' => "Bearer {$this->token}",
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function setClient(Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    protected function transformCollection(array $collection, string $class): array
    {
        return array_map(function ($attributes) use ($class) {
            return new $class($attributes, $this);
        }, $collection);
    }

    public function convertDateFormat(string $date, $format = 'Y-m-d H:i:s'): string
    {
        return Carbon::parse($date)->format($format);
    }
}
