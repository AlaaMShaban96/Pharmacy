<?php

namespace App\Repositories;

use App\Models\Outlay;
use App\Repositories\BaseRepository;

/**
 * Class OutlayRepository
 * @package App\Repositories
 * @version April 11, 2022, 9:14 pm UTC
*/

class OutlayRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'financial_covenant_id',
        'note',
        'price'
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
        return Outlay::class;
    }
}
