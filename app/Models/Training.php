<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Eloquent as Model;
use App\Models\TrainingType;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Training
 * @package App\Models
 * @version June 14, 2022, 4:33 pm UTC
 *
 * @property foreignId $training_type_id
 * @property string $date
 * @property string $loction
 * @property number $cost
 * @property string $end_date
 */
class Training extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'trainings';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'training_type_id',
        'date',
        'loction',
        'cost',
        'end_date',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'loction' => 'string',
        'cost' => 'float',
        'end_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'training_type_id' => 'required',
        'date' => 'required',
        'loction' => 'required',
        'cost' => 'required',
        'end_date' => 'required'
    ];
    public function getEndDateAttribute()
    {
        $date= Carbon::parse($this->attributes['end_date']);
        return  $date->format('Y-m-d');
        // return $this->attributes['from']->format('Y-m-d');
    }
    public function getDateAttribute()
    {
        $date= Carbon::parse($this->attributes['date']);
        return  $date->format('Y-m-d');
    }
    /**
     * The user that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'training_users', 'training_id','user_id');
    }
    /**
     * Get the trainingType that owns the Training
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trainingType(): BelongsTo
    {
        return $this->belongsTo(TrainingType::class);
    }
}
