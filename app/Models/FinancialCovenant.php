<?php

namespace App\Models;

use App\Models\User;
use Eloquent as Model;
use App\Models\Department;
use App\Models\FinancialCovenantType;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FinancialCovenant
 * @package App\Models
 * @version May 11, 2022, 8:49 pm UTC
 *
 * @property foreignId $department_id
 * @property foreignId $financial_covenant_type_id
 * @property string $number
 * @property integer $amount
 * @property string $date
 * @property string $note
 * @property number $total
 */
class FinancialCovenant extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'financial_covenants';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'department_id',
        'financial_covenant_type_id',
        'number',
        'amount',
        'date',
        'note',
        'total',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'number' => 'string',
        'amount' => 'integer',
        'date' => 'date',
        'note' => 'string',
        'total' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'department_id' => 'required',
        'financial_covenant_type_id' => 'required',
        'amount' => 'required',
        'date' => 'required'
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $department=Department::find($model->department_id);
            $financialCovenantType=FinancialCovenantType::find($model->financial_covenant_type_id);
            rand(10000,99999);
            $model->number=$department->n_code.'-'.$financialCovenantType->code.'-'.rand(10000,99999);
        });
    }
    /**
     * Get the user that owns the FinancialCovenant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the department that owns the FinancialCovenant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
     /**
     * Get the department that owns the FinancialCovenant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function financialCovenantType(): BelongsTo
    {
        return $this->belongsTo(FinancialCovenantType::class);
    }
}
