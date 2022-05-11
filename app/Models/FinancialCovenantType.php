<?php

namespace App\Models;

use App\Models\Clause;
use Eloquent as Model;
use App\Models\Department;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FinancialCovenantType
 * @package App\Models
 * @version May 11, 2022, 5:14 pm UTC
 *
 * @property string $name
 * @property string $code
 * @property foreignId $department_id
 */
class FinancialCovenantType extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'financial_covenant_types';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'code',
        'cost',
        'department_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'department_id' => 'required',
        'cost' => 'required'

    ];
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if (self::where('department_id',$model->department_id)->get()->isEmpty()) {
                $model->code="A";
            } else {
                $last_code=self::where('department_id',$model->department_id)->orderBy('id', 'DESC')->first()->code;
                $alphas = range('A', 'Z');
                foreach ($alphas as $key => $value) {
                    if ($last_code==$value) {
                        $model->code=$alphas[$key+1];
                        break;
                    }
                }
            }

        });
    }
    /**
     * Get the department that owns the FinancialCovenantType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    /**
     * Get all of the comments for the FinancialCovenantType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clauses(): HasMany
    {
        return $this->hasMany(Clause::class);
    }

}
