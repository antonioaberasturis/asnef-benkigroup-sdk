<?php

namespace Asnef\Benkigroup\Actions;

use Asnef\Benkigroup\Resources\FileRecord;

trait ManagesFileRecord
{

    public function fileRecordInclude(
        string $customer_id,
        string $contract_id,
        string $date_start,
        string $date_end,
        int $quota_count,
        int $quota_unpaid_count,
        string $quota_unpaid_due_date_start,
        string $quota_unpaid_due_date_end,
        float $amount_unpaid,
        string $personalid,
        string $name,
        string $street,
        string $city,
        string $province_code,
        string $postal_code,
        string $identifier = '',
        float $amount = null,
        float $quota_amount = null,
        float $amount_pending = null,
        string $first_surname = '',
        string $second_surname = '',
        string $nationality_country_code = '',
        string $national_ocupation_code = '',
        string $enterprise_activities_code = '',
        string $street_type = '',
        string $street_number = '',
        string $street_additional = '',
        string $city_code = '',
        string $phone_number = '',
        string $operator_id = '',
        string $operator_name = ''
    ) {
        $params = [
            'customer_id' => $customer_id,
            'contract_id' => $contract_id,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'quota_count' => $quota_count,
            'quota_unpaid_count' => $quota_unpaid_count,
            'quota_unpaid_due_date_start' => $quota_unpaid_due_date_start,
            'quota_unpaid_due_date_end' => $quota_unpaid_due_date_end,
            'amount_unpaid' => $amount_unpaid,
            'personalid' => $personalid,
            'name' => $name,
            'street' => $street,
            'city' => $city,
            'province_code' => $province_code,
            'postal_code' => $postal_code,
        ];
        $identifier ? $params['identifier'] = $identifier : null;
        $amount ? $params['amount'] = $amount : null;
        $quota_amount ? $params['quota_amount'] = $quota_amount : null;
        $amount_pending ? $params['amount_pending'] = $amount_pending : null;
        $first_surname ? $params['first_surname'] = $first_surname : null;
        $second_surname ? $params['second_surname'] = $second_surname : null;
        $nationality_country_code ? $params['nationality_country_code'] = $nationality_country_code : null;
        $national_ocupation_code ? $params['national_ocupation_code'] = $national_ocupation_code : null;
        $enterprise_activities_code ? $params['enterprise_activities_code'] = $enterprise_activities_code : null;
        $street_type ? $params['street_type'] = $street_type : null;
        $street_number ? $params['street_number'] = $street_number : null;
        $street_additional ? $params['street_additional'] = $street_additional : null;
        $city_code ? $params['city_code'] = $city_code : null;
        $phone_number ? $params['phone_number'] = $phone_number : null;
        $operator_id ? $params['operator_id'] = $operator_id : '';
        $operator_name ? $params['operator_name'] = $operator_name : '';


        $record = $this->post('files/records/include', $params);

        return new FileRecord($record, $this);
    }

    public function fileRecordExclude(int $id, string $customer_id, string $contract_id, $operator_id = '', $operator_name = '')
    {
        $params = [];
        $operator_id ? $params['operator_id'] = $operator_id : '';
        $operator_name ? $params['operator_name'] = $operator_name : '';

        if (!empty($id)) {
            return new FileRecord($this->post("files/records/{$id}/exclude", []), $this);
        }

        return new FileRecord($this->post("files/records/exclude", array_merge($params, [
            'customer_id' => $customer_id,
            'contract_id' => $contract_id,
        ])), $this);
    }

    public function fileRecordUpdate(
        int $id,
        string $customer_id,
        string $contract_id,
        float $amount_unpaid,
        float $amount_pending = NULL,
        int $quota_unpaid_count = NULL,
        string $quota_unapid_due_date_start = '',
        string $quota_unapid_due_date_end = '',
        string $operator_id = '',
        string $operator_name = ''
    ) {
        $params = [
            'amount_unpaid' => $amount_unpaid,
        ];
        $amount_pending ? $params['amount_pending'] = $amount_pending : null;
        $quota_unpaid_count ? $params['quota_unpaid_count'] = $quota_unpaid_count : null;
        $quota_unapid_due_date_start ? $params['quota_unapid_due_date_start'] = $quota_unapid_due_date_start : null;
        $quota_unapid_due_date_end ? $params['quota_unapid_due_date_end'] = $quota_unapid_due_date_end : null;
        $operator_id ? $params['operator_id'] = $operator_id : '';
        $operator_name ? $params['operator_name'] = $operator_name : '';

        if (!empty($id)) {
            return new FileRecord($this->post("files/records/{$id}/update", $params), $this);
        }
        return new FileRecord($this->post("files/records/update", array_merge($params, [
            'customer_id' => $customer_id,
            'contract_id' => $contract_id,
        ])), $this);
    }

    public function fileRecordShow(int $id)
    {
        return new FileRecord($this->get("files/records/{$id}"), $this);
    }
}
