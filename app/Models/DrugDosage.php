<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DrugDosage
 * @package App\Models
 * @version March 31, 2022, 5:02 pm UTC
 *
 * @property string $name
 */
class DrugDosage extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'drug_dosages';
    

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
        'name' => 'required'
    ];

    
}
