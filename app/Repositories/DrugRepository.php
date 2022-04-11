<?php

namespace App\Repositories;

use App\Models\Drug;
use App\Repositories\BaseRepository;

/**
 * Class DrugRepository
 * @package App\Repositories
 * @version March 31, 2022, 5:08 pm UTC
*/

class DrugRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'atc',
        'name',
        'b_g',
        'ingredients',
        'drug_dosage',
        'company_id',
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
        return Drug::class;
    }
}
