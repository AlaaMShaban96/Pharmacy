<?php

namespace App\Models;

use App\Models\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Doctor
 * @package App\Models
 * @version May 24, 2022, 8:34 pm UTC
 *
 * @property string $name
 * @property string $phone_number
 */
class Doctor extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'doctors';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'phone_number'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'phone_number' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'phone_number' => 'required|unique:users,mobile'
    ];
    /**
     * Get the user associated with the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }


}
