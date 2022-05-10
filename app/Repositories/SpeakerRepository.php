<?php

namespace App\Repositories;

use App\Models\Speaker;
use App\Repositories\BaseRepository;

/**
 * Class SpeakerRepository
 * @package App\Repositories
 * @version May 10, 2022, 4:14 pm UTC
*/

class SpeakerRepository extends BaseRepository
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
        return Speaker::class;
    }
}
