<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\FinancialCovenantType;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Clause
 * @package App\Models
 * @version May 11, 2022, 7:45 pm UTC
 *
 * @property string $name
 * @property foreignId $financial_covenant_type_id
 */
class Clause extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'clauses';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'financial_covenant_type_id'
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
        'name' => 'required',
        'financial_covenant_type_id' => 'required'
    ];
    /**
     * Get the FinancialCovenantType that owns the Clause
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function financialCovenantType(): BelongsTo
    {
        return $this->belongsTo(FinancialCovenantType::class);
    }


}
