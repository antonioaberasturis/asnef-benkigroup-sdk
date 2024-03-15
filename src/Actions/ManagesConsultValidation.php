<?php

namespace Asnef\Benkigroup\Actions;

use Asnef\Benkigroup\Resources\Validation;

trait ManagesConsultValidation
{
    /**
     * Get Validations of Transaction.
     *
     * @return \Asnef\Benkigroup\Resources\Validation[]
     */
    public function consultValidations(int $transaction_id): array
    {
        $validations = $this->get("consult/transactions/{$transaction_id}/validations");

        return array_map(function (array $validationAttributes) {
            return new Validation($validationAttributes, $this);
        }, $validations);
    }
}
