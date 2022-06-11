<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Gool
 * @package App\Models
 * @version June 11, 2022, 7:18 pm UTC
 *
 * @property string $name
 * @property string $from
 * @property string $to
 * @property number $cost
 * @property foreignId $user_id
 */
class Gool extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'gools';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'from',
        'to',
        'cost',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'from' => 'date',
        'to' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'from' => 'required',
        'to' => 'required',
        'cost' => 'required',
        'user_id' => 'required'
    ];

    
}
