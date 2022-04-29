<?php

namespace App\Repositories;

use App\Models\EventType;
use App\Repositories\BaseRepository;

/**
 * Class EventTypeRepository
 * @package App\Repositories
 * @version April 29, 2022, 2:52 pm UTC
*/

class EventTypeRepository extends BaseRepository
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
        return EventType::class;
    }
}
