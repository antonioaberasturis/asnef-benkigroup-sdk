<?php

namespace Asnef\Benkigroup\Actions;

use Asnef\Benkigroup\Resources\SimplePagination;
use Asnef\Benkigroup\Resources\Transaction;

trait ManagesConsultTransaction
{
    /**
     * Consult Transaction.
     *
     * @return \Asnef\Benkigroup\Resources\Transaction
     */
    public function consultTransaction(int $id, bool $details = false): Transaction
    {
        $uri = "consult/transactions/{$id}";
        $uri .= $details ? '?details=1' : '';
        $transaction = $this->get($uri);

        return new Transaction($transaction, $this);
    }

    /**
     * Get Transaction by lead_id.
     *
     * @return Transaction
     */
    public function consultTransactionByLead(string $lead_id, bool $details = false)
    {
        $uri = "consult/transactions/lead/{$lead_id}";
        $uri .= $details ? '?details=1' : '';
        $transaction = $this->get($uri);

        return new Transaction($transaction, $this);
    }

    /**
     * Get Transactions by filters.
     *
     * @return \Asnef\Benkigroup\Resources\SimplePagination
     */
    public function consultTransactions(
        string $lead_id = '',
        string $customer_id = '',
        string $personalid = '',
        string $person_name = '',
        string $document_id = '',
        string $created_at_start = '',
        string $created_at_end = '',
        int $has_data = null,
        float $total_payment_unpaid_amount_start = null,
        float $total_payment_unpaid_amount_end = null,
        int $worst_situation_id = null,
        int $count = null,
        int $page = null
    ) {
        $params = [];
        $uri = 'consult/transactions?';
        $lead_id ? $params['lead_id'] = $lead_id : null;
        $customer_id ? $params['customer_id'] = $customer_id : null;
        $personalid ? $params['personalid'] = $personalid : null;
        $person_name ? $params['person_name'] = $person_name : null;
        $document_id ? $params['document_id'] = $document_id : null;
        $created_at_start ? $params['created_at_start'] = $created_at_start : null;
        $created_at_end ? $params['created_at_end'] = $created_at_end : null;
        $has_data !== null ? $params['has_data'] = $has_data : null;
        $total_payment_unpaid_amount_start ? $params['total_payment_unpaid_amount_start'] = $total_payment_unpaid_amount_start : null;
        $total_payment_unpaid_amount_end ? $params['total_payment_unpaid_amount_end'] = $total_payment_unpaid_amount_end : null;
        $worst_situation_id ? $params['worst_situation_id'] = $worst_situation_id : null;
        $page ? $params['page'] = $page : null;
        $count ? $params['count'] = $count : null;

        return new SimplePagination($this->get($uri.http_build_query($params)), Transaction::class, $this);
    }
}
