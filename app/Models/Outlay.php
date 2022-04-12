<?php

namespace App\Models;

use App\Models\User;
use Eloquent as Model;
use App\Models\FinancialCovenant;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Outlay
 * @package App\Models
 * @version April 11, 2022, 9:14 pm UTC
 *
 * @property number $user_id
 * @property number $financial_covenant_id
 * @property string $note
 * @property number $price
 */
class Outlay extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'outlays';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'financial_covenant_id',
        'note',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'double',
        'financial_covenant_id' => 'double',
        'note' => 'string',
        'price' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'financial_covenant_id' => 'required',
        'price' => 'required'
    ];
    /**
     * Get the user that owns the Outlay
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
    /**
     * Get the FinancialCovenant that owns the Outlay
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function financialCovenant(): BelongsTo
    {
        return $this->belongsTo(FinancialCovenant::class);
    }


}
