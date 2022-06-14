<?php

namespace App\Repositories;

use App\Models\Training;
use App\Repositories\BaseRepository;

/**
 * Class TrainingRepository
 * @package App\Repositories
 * @version June 14, 2022, 4:33 pm UTC
*/

class TrainingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'training_type_id',
        'date',
        'loction',
        'cost',
        'end_date'
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
        return Training::class;
    }
}
