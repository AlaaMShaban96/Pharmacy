<?php

namespace App\Repositories;

use App\Models\ShipmentModel;
use App\Repositories\BaseRepository;

/**
 * Class ShipmentModelRepository
 * @package App\Repositories
 * @version May 16, 2022, 5:40 pm UTC
*/

class ShipmentModelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'drug_id',
        'validity',
        'playback_number',
        'location',
        'count',
        'In_kind_inventory',
        'samples',
        'damaged',
        'free',
        'another'
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
        return ShipmentModel::class;
    }
}
