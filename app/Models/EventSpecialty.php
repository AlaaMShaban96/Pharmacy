<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EventSpecialty
 * @package App\Models
 * @version April 29, 2022, 2:50 pm UTC
 *
 * @property string $name
 */
class EventSpecialty extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'event_specialties';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
