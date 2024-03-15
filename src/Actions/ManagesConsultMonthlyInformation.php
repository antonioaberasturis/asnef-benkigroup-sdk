<?php

namespace Asnef\Benkigroup\Actions;

use Asnef\Benkigroup\Resources\MonthlyInformation;

trait ManagesConsultMonthlyInformation
{
    public function consultMonthlyInformations(int $transaction_id): array
    {
        $informations = $this->get("consult/transactions/{$transaction_id}/monthly-informations");

        return array_map(function (array $informationAttributes) {
            return new MonthlyInformation($informationAttributes, $this);
        }, $informations);
    }
}
