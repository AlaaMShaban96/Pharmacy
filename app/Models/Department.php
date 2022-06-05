<?php

namespace App\Models;

use App\Models\User;
use Eloquent as Model;
use App\Models\FinancialCovenantType;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Department
 * @package App\Models
 * @version May 11, 2022, 5:00 pm UTC
 *
 * @property string $name
 * @property foreignId $user_id
 * @property string $d_code
 * @property string $n_code
 */
class Department extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'departments';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'user_id',
        'd_code',
        'n_code'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'd_code' => 'string',
        'n_code' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        // 'user_id' => 'required',
        'd_code' => 'required',
        'n_code' => 'required'
    ];
    /**
     * Get the user that owns the Department
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function financialCovenantTypes(): HasMany
    {
        return $this->hasMany(FinancialCovenantType::class);
    }
    /**
     * Get the user that owns the Department
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
