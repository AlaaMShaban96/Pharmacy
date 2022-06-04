<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version April 11, 2022, 4:57 pm UTC
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

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
        return User::class;
    }
    public function pluck($needThis, $needThisToo,$columns = ['*'])
    {
        $user=User::where('email','admin@email.com')->first();
        $query = $this->model->newQuery()->where('id','!=',$user->id);

        return $query->pluck($needThis, $needThisToo);
    }
}
