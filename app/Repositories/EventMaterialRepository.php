<?php

namespace App\Repositories;

use App\Models\EventMaterial;
use App\Repositories\BaseRepository;

/**
 * Class EventMaterialRepository
 * @package App\Repositories
 * @version April 30, 2022, 1:41 pm UTC
*/

class EventMaterialRepository extends BaseRepository
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
        return EventMaterial::class;
    }
}
