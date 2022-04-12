<?php

namespace App\Models;

use App\Models\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FinancialCovenant
 * @package App\Models
 * @version April 11, 2022, 5:17 pm UTC
 *
 * @property string $name
 * @property number $amount
 * @property number $user_id
 */
class FinancialCovenant extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'financial_covenants';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'amount',
        'user_id',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'amount' => 'double',
        'user_id' => 'double',
        'total' => 'double',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'amount' => 'required',
        'user_id' => 'required'
    ];
    /**
     * Get the user that owns the FinancialCovenant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
