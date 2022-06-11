<?php

namespace App\Repositories;

use App\Models\Tool;
use App\Repositories\BaseRepository;

/**
 * Class ToolRepository
 * @package App\Repositories
 * @version June 11, 2022, 7:09 pm UTC
*/

class ToolRepository extends BaseRepository
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
        return Tool::class;
    }
}
