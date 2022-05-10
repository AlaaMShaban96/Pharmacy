<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\Company;
use App\Models\Currency;
use App\Models\EventMaterial;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Invoice
 * @package App\Models
 * @version May 10, 2022, 5:31 pm UTC
 *
 * @property integer $company_id
 * @property integer $currency_id
 * @property number $price
 * @property integer $user_id
 */
class Invoice extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'invoices';


    protected $dates = ['deleted_at','created_at'];



    public $fillable = [
        'company_id',
        'currency_id',
        'price',
        'user_id',
        'note',
        'type',
        'drug_id',
        'count',
        'event_material_id',

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'company_id' => 'integer',
        'currency_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'company_id' => 'required',
        'currency_id' => 'required',
        'price' => 'required'
    ];
    public function getCreatedAtDiffAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }
    /**
     * Get the EventMaterial that owns the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventMaterial(): BelongsTo
    {
        return $this->belongsTo(EventMaterial::class, 'event_material_id');
    }
    /**
     * Get the EventMaterial that owns the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class,'company_id');
    }
    /**
     * Get the EventMaterial that owns the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }


}
