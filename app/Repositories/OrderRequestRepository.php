<?php

namespace App\Repositories;

use App\Models\OrderRequest;
use App\Repositories\BaseRepository;

/**
 * Class OrderRequestRepository
 * @package App\Repositories
 * @version May 25, 2022, 6:04 pm UTC
*/

class OrderRequestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code'
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
        return OrderRequest::class;
    }
}
