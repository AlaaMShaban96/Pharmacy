<?php

namespace App\Repositories;

use App\Models\Clause;
use App\Repositories\BaseRepository;

/**
 * Class ClauseRepository
 * @package App\Repositories
 * @version May 11, 2022, 7:45 pm UTC
*/

class ClauseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'financial_covenant_type_id'
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
        return Clause::class;
    }
}
