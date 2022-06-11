<?php

namespace App\Repositories;

use App\Models\Gool;
use App\Repositories\BaseRepository;

/**
 * Class GoolRepository
 * @package App\Repositories
 * @version June 11, 2022, 7:18 pm UTC
*/

class GoolRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'from',
        'to',
        'cost',
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
        return Gool::class;
    }
}
