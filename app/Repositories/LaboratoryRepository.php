<?php

namespace App\Repositories;

use App\Models\Laboratory;
use App\Repositories\BaseRepository;

/**
 * Class LaboratoryRepository
 * @package App\Repositories
 * @version April 6, 2022, 11:00 pm UTC
*/

class LaboratoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Laboratory::class;
    }
}
