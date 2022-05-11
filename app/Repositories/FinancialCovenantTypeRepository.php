<?php

namespace App\Repositories;

use App\Models\FinancialCovenantType;
use App\Repositories\BaseRepository;

/**
 * Class FinancialCovenantTypeRepository
 * @package App\Repositories
 * @version May 11, 2022, 5:14 pm UTC
*/

class FinancialCovenantTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code',
        'department_id'
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
        return FinancialCovenantType::class;
    }
}
