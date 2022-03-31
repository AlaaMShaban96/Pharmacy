<?php

namespace App\Repositories;

use App\Models\Drug;
use App\Repositories\BaseRepository;

/**
 * Class DrugRepository
 * @package App\Repositories
 * @version March 30, 2022, 7:47 pm UTC
*/

class DrugRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ATC',
        'name',
        'B_G',
        'ingredients',
        'drug_dosage_id',
        'company_id'
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
        return Drug::class;
    }
}
