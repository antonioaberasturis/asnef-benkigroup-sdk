<?php

namespace Asnef\Benkigroup\Actions;

use Asnef\Benkigroup\Resources\FileRecordHistory;
use Asnef\Benkigroup\Resources\SimplePagination;

trait ManagesFileRecordHistory
{
    /**
     * Get the File Recod Histories.
     *
     * @return \Asnef\Benkigroup\Resources\SimplePagination
     */
    public function fileRecordHistories(
        int $record_id = null,
        string $customer_id = '',
        string $contract_id = '',
        int $status_id = null,
        string $operator_id = '',
        string $operator_name = '',
        int $page = null,
        int $count = null
    ) {
        $params = [];
        $uri = 'files/records/historys?';
        $record_id ? $params['record_id'] = $record_id : null;
        $customer_id ? $params['customer_id'] = $customer_id : '';
        $contract_id ? $params['contract_id'] = $contract_id : '';
        $status_id ? $params['status_id'] = $status_id : null;
        $operator_id ? $params['operator_id'] = $operator_id : '';
        $operator_name ? $params['operator_name'] = $operator_name : '';
        $page ? $params['page'] = $page : null;
        $count ? $params['count'] = $count : null;

        if ($params) {
            $uri .= \http_build_query($params);
        }

        return new SimplePagination($this->get($uri), FileRecordHistory::class, $this);
    }
}
