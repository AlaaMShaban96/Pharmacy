<?php

namespace App\Repositories;

use App\Models\DrugDosage;
use App\Repositories\BaseRepository;

/**
 * Class DrugDosageRepository
 * @package App\Repositories
 * @version March 31, 2022, 5:02 pm UTC
*/

class DrugDosageRepository extends BaseRepository
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
        return DrugDosage::class;
    }
}
