<?php

namespace App\Repositories;

use App\Models\Stratum;
use App\Repositories\BaseRepository;

/**
 * Class StratumRepository
 * @package App\Repositories
 * @version April 6, 2022, 2:35 pm UTC
*/

class StratumRepository extends BaseRepository
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
        return Stratum::class;
    }
}
