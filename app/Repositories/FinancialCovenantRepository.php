<?php

namespace App\Repositories;

use App\Models\FinancialCovenant;
use App\Repositories\BaseRepository;

/**
 * Class FinancialCovenantRepository
 * @package App\Repositories
 * @version April 11, 2022, 5:17 pm UTC
*/

class FinancialCovenantRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'amount',
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
        return FinancialCovenant::class;
    }
}
