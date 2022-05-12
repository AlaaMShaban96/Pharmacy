<?php

namespace App\Repositories;

use App\Models\FinancialCovenant;
use App\Repositories\BaseRepository;

/**
 * Class FinancialCovenantRepository
 * @package App\Repositories
 * @version May 11, 2022, 8:49 pm UTC
*/

class FinancialCovenantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'department_id',
        'financial_covenant_type_id',
        'number',
        'amount',
        'date',
        'note',
        'total'
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
        return FinancialCovenant::class;
    }
}
