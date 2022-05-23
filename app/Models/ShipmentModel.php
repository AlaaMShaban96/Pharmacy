<?php

namespace App\Models;

use App\Models\Drug;
use App\Models\User;
use Eloquent as Model;
use App\Models\Company;
use App\Models\Receive;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ShipmentModel
 * @package App\Models
 * @version May 16, 2022, 5:40 pm UTC
 *
 * @property string $code
 * @property foreignId $drug_id
 * @property string $validity
 * @property string $playback_number
 * @property string $location
 * @property integer $count
 * @property integer $In_kind_inventory
 * @property integer $samples
 * @property integer $damaged
 * @property integer $free
 * @property integer $another
 */
class ShipmentModel extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'shipment_models';
    protected $appends = ['total_missing','total_surplus','after_payment','total'];

    protected $dates = ['deleted_at'];



    public $fillable = [
        'code',
        'drug_id',
        'validity',
        'playback_number',
        'location',
        'count',
        'in_kind_inventory',
        'samples',
        'damaged',
        'free',
        'another',
        'user_id',
        'receive_id',
        'drug_size',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'validity' => 'date',
        'playback_number' => 'string',
        'location' => 'string',
        'count' => 'integer',
        'in_kind_inventory' => 'integer',
        'samples' => 'integer',
        'damaged' => 'integer',
        'free' => 'integer',
        'another' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'drug_id' => 'required',
        'validity' => 'required',
        'playback_number' => 'required',
        'count' => 'required',
        'in_kind_inventory' => 'required',
        'samples' => 'required',
        'damaged' => 'required',
        'free' => 'required',
        'another' => 'required'
    ];
    public function getValidityAttribute()
    {
        return $this->attributes['validity']  ;
    }
    public function getTotalMissingAttribute()
    {
        if ($this->type=='receive') {
            return $this->damaged;

        }
        return $this->damaged + $this->samples;
    }
    public function getTotalSurplusAttribute()
    {
        if ($this->type=='receive') {
            return $this->another;

        }
        return $this->free + $this->another;

    }
    public function getAfterPaymentAttribute()
    {
        return $this->in_kind_inventory -  $this->total_missing + $this->total_surplus;
    }
    public function getTotalAttribute()
    {
        return $this->after_payment -  $this->count;
    }
    /**
     * Get the receive that owns the ShipmentModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receive(): BelongsTo
    {
        return $this->belongsTo(Receive::class);
    }
    /**
     * Get the user that owns the ShipmentModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
      /**
     * Get the drug that owns the ShipmentModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function drug(): BelongsTo
    {
        return $this->belongsTo(Drug::class);
    }



}
