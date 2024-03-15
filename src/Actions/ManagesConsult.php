<?php

namespace Asnef\Benkigroup\Actions;

use Asnef\Benkigroup\Resources\Transaction;

trait ManagesConsult
{
    /**
     * Consult Transaction.
     * 
     * @param string $personalid
     * @param string $customer_id
     * @param string $lead_id
     * @param string $force
     * @param string $type
     * @return Transaction
     */
    public function consult(string $personalid, string $customer_id = '', string $lead_id = '', bool $force = false, string $type = ''): Transaction
    {
        $params = [
            'personalid' => $personalid
        ];
        if ($customer_id) {
            $params['customer_id'] = $customer_id;
        }
        if ($lead_id) {
            $params['lead_id'] = $lead_id;
        }
        if ($force) {
            $params['force'] = $force;
        }
        if ($type) {
            $params['type'] = $type;
        }

        $transaction = $this->post("files/consult", $params);
        return new Transaction($transaction, $this);
    }
}
