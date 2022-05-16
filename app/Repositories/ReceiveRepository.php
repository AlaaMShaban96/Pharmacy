<?php

namespace App\Repositories;

use App\Models\Receive;
use App\Repositories\BaseRepository;

/**
 * Class ReceiveRepository
 * @package App\Repositories
 * @version May 15, 2022, 7:52 pm UTC
*/

class ReceiveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'receive_date',
        'inventory_date',
        'company_id',
        'company_code',
        'shipment_number',
        'invoice_number',
        'packing_list_number',
        'containers_number',
        'pallet_number',
        'shipment_type'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Receive::class;
    }
}
