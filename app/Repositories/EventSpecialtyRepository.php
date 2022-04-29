<?php

namespace App\Repositories;

use App\Models\EventSpecialty;
use App\Repositories\BaseRepository;

/**
 * Class EventSpecialtyRepository
 * @package App\Repositories
 * @version April 29, 2022, 2:50 pm UTC
*/

class EventSpecialtyRepository extends BaseRepository
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
        return EventSpecialty::class;
    }
}
