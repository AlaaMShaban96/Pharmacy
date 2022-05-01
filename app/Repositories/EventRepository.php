<?php

namespace App\Repositories;

use App\Models\Event;
use App\Repositories\BaseRepository;

/**
 * Class EventRepository
 * @package App\Repositories
 * @version April 30, 2022, 2:05 pm UTC
*/

class EventRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'event_specialty_id',
        'event_location_id',
        'event_number',
        'event_date',
        'visitors_number',
        'event_food_location',
        'event_spicy_food_location',
        'event_sweet_food_location',
        'media_company_id',
        'decoration_company_id',
        'medical_representative',
        'event_time',
        'event_cost',
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
        return Event::class;
    }
}
