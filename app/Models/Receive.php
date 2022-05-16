<?php

namespace App\Models;

use App\Models\User;
use Eloquent as Model;
use App\Models\Company;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Receive
 * @package App\Models
 * @version May 15, 2022, 7:52 pm UTC
 *
 * @property string $receive_date
 * @property string $inventory_date
 * @property foreignId $company_id
 * @property string $company_code
 * @property string $shipment_number
 * @property string $invoice_number
 * @property string $packing_list_number
 * @property string $containers_number
 * @property integer $pallet_number
 * @property string $shipment_type
 */
class Receive extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'receives';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'receive_date',
        'inventory_date',
        'company_id',
        'company_code',
        'shipment_number',
        'invoice_number',
        'packing_list_number',
        'containers_number',
        'pallet_number',
        'shipment_type',
        'store_id',
        'user_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'receive_date' => 'date',
        'inventory_date' => 'date',
        'company_code' => 'string',
        'shipment_number' => 'string',
        'invoice_number' => 'string',
        'packing_list_number' => 'string',
        'containers_number' => 'integer',
        'pallet_number' => 'integer',
        'store_id' => 'integer',
        'shipment_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'receive_date' => 'required',
        'inventory_date' => 'required',
        'company_id' => 'required',
        'company_code' => 'required',
        'shipment_number' => 'required',
        'invoice_number' => 'required',
        'packing_list_number' => 'required',
        'containers_number' => 'required',
        'pallet_number' => 'required',
        'shipment_type' => 'required',
        'store_id' => 'required',
    ];

    /**
     * Get the user that owns the Receive
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the company that owns the Receive
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
