<?php

namespace Asnef\Benkigroup\Actions;

use Asnef\Benkigroup\Resources\Operation;

trait ManagesConsultOperation
{
    /**
     * Get Operations of Transaction.
     *
     * @return \Asnef\Benkigroup\Resources\Operation[]
     */
    public function consultOperations(int $transaction_id): array
    {
        $operations = $this->get("consult/transactions/{$transaction_id}/operations");

        return array_map(function (array $operationAttributes) {
            return new Operation($operationAttributes, $this);
        }, $operations);
    }
}
