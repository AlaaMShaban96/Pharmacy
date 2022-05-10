<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EventMaterial
 * @package App\Models
 * @version April 30, 2022, 1:41 pm UTC
 *
 * @property string $name
 */
class EventMaterial extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'event_materials';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'count',
        'price'
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
    /**
     * Get all of the Invoices for the EventMaterial
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class, 'event_material_id',);
    }


}
