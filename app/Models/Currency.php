<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Currency
 * @package App\Models
 * @version April 1, 2022, 6:51 pm UTC
 *
 * @property string $name
 */
class Currency extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'currencies';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'price' => 'required'

    ];


}
