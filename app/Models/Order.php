<?php

namespace App\Models;

use App\Models\Drug;
use App\Models\User;
use App\Models\Doctor;
use Eloquent as Model;
use App\Models\OrderRequest;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Order
 * @package App\Models
 * @version May 25, 2022, 4:55 pm UTC
 *
 * @property foreignId $doctor_id
 * @property foreignId $drug_id
 * @property integer $quantity
 * @property string $for
 * @property string $status
 * @property foreignId $user_id
 */
class Order extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'orders';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'drug_id',
        'quantity',
        'for',
        'price',
        'order_request_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'quantity' => 'integer',
        'for' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'doctor_id' => 'required',
        'drug_id' => 'required',
        'quantity' => 'required',
        'for' => 'required'
    ];

    /**
     * Get the drug that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function drug(): BelongsTo
    {
        return $this->belongsTo(Drug::class);
    }

    /**
     * Get the orderRequest that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderRequest(): BelongsTo
    {
        return $this->belongsTo(OrderRequest::class);
    }

}
