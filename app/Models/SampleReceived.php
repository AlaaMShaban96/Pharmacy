<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Drug;
use App\Models\User;
use App\Models\Order;
use App\Models\Store;
use Eloquent as Model;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SampleReceived
 * @package App\Models
 * @version May 24, 2022, 4:08 pm UTC
 *
 * @property string $code
 * @property foreignId $company_id
 * @property string $validity
 * @property foreignId $store_id
 * @property number $price
 * @property foreignId $user_id
 */
class SampleReceived extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'sample_receiveds';


    protected $dates = ['deleted_at'];

    protected $appends = ['total','remaining'];


    public $fillable = [
        'code',
        'company_id',
        'drug_id',
        'validity',
        'store_id',
        'price',
        'user_id',
        'quantity'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'validity' => 'date',
        'price' => 'float',
        'drug_id'=>'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'company_id' => 'required',
        'validity' => 'required',
        'price' => 'required',
        'quantity' => 'required',
        'drug_id' => 'required',
    ];
    /**
     * Get total from sum(price * quantity)
     *
     * @return float
     */
    public function getTotalAttribute()
    {
        $value =self::whereYear('created_at',Carbon::now()->year)->where('code',$this->code)->sum(\DB::raw('price * quantity'));
        return $value;
    }
    /**
     * Get Remaining from sum(price * quantity) on  table Order and Subtract from total
     *
     * @return float
     */
    public function getRemainingAttribute()
    {
        $value =Order::whereHas('orderRequest', function($q){
            $q->where('status','receive');
        })->whereYear('created_at',Carbon::now()->year)->where('drug_id',$this->drug_id)->sum(\DB::raw('price * quantity'));
        return  $this->total - $value ;
    }
    /**
     * Get the user that owns the SampleReceived
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the company that owns the SampleReceived
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    /**
     * Get the store that owns the SampleReceived
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
        /**
     * Get the drug that owns the SampleReceived
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function drug(): BelongsTo
    {
        return $this->belongsTo(Drug::class);
    }
}
