<?php

namespace App\Repositories;

use App\Models\TrainingType;
use App\Repositories\BaseRepository;

/**
 * Class TrainingTypeRepository
 * @package App\Repositories
 * @version June 14, 2022, 2:53 pm UTC
*/

class TrainingTypeRepository extends BaseRepository
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
        return TrainingType::class;
    }
}
