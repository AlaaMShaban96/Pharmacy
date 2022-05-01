<?php

namespace App\Repositories;

use App\Models\EventLocation;
use App\Repositories\BaseRepository;

/**
 * Class EventLocationRepository
 * @package App\Repositories
 * @version April 29, 2022, 9:00 pm UTC
*/

class EventLocationRepository extends BaseRepository
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
        return EventLocation::class;
    }
}
