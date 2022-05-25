<?php

namespace App\Repositories;

use App\Models\SampleReceived;
use App\Repositories\BaseRepository;

/**
 * Class SampleReceivedRepository
 * @package App\Repositories
 * @version May 24, 2022, 4:08 pm UTC
*/

class SampleReceivedRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'company_id',
        'validity',
        'store_id',
        'price',
        'user_id'
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
        return SampleReceived::class;
    }
}
