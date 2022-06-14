<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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


    protected $dates = ['deleted_at','from','to'];



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
    public function getFromAttribute()
    {
        $date= Carbon::parse($this->attributes['from']);
        return  $date->format('Y-m-d');
        // return $this->attributes['from']->format('Y-m-d');
    }
    public function getToAttribute()
    {
        $date= Carbon::parse($this->attributes['to']);
        return  $date->format('Y-m-d');
    }
    /**
     * Get the user that owns the Gool
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
