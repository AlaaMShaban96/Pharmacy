<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Doctor;
use Eloquent as Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class OrderRequest
 * @package App\Models
 * @version May 25, 2022, 6:04 pm UTC
 *
 * @property string $code
 */
class OrderRequest extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'order_requests';


    protected $dates = ['deleted_at'];

    protected $appends = ['total'];

    public $fillable = [
        'code','status','doctor_id','user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required'
    ];
    public function getTotalAttribute()
    {
        return $this->orders()->whereYear('created_at', Carbon::now()->year)->sum('price');
    }

    /**
     * Get all of the order for the OrderRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the doctor that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

}
