<?php

namespace App\Models;

use App\Models\Route;
use Eloquent as Model;
use App\Models\Company;
use App\Models\Country;
use App\Models\Package;
use App\Models\Stratum;
use App\Models\Currency;
use App\Models\DrugDosage;
use App\Models\Laboratory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Drug
 * @package App\Models
 * @version March 31, 2022, 5:08 pm UTC
 *
 * @property string $atc
 * @property string $name
 * @property string $b_g
 * @property string $Ingredients
 * @property foreignId $drug_dosage
 * @property foreignId $company_id
 * @property number $price
 */
class Drug extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'drugs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'atc',
        'name',
        'b_g',
        'code',
        'package_id',
        'ingredients',
        'drug_dosage_id',
        'company_id',
        'strata_id',
        'route_id',
        'currency_id',
        'country_id',
        'laboratory_id',
        'price',
        'selling_price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'atc' => 'string',
        'name' => 'string',
        'code' => 'string',
        'b_g' => 'string',
        'ingredients' => 'string',
        'price' => 'float',
        'selling_price' => 'float',

    ];

    /**


     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'atc' => 'required',
        'name' => 'required',
        'code' => 'required',
        'package_id' => 'required',
        'b_g' => 'required',
        'ingredients' => 'required',
        'drug_dosage_id' => 'required',
        'company_id' => 'required',
        'currency_id' => 'required',
        'price' => 'required',
        'selling_price' => 'required'

    ];
    public function getPercentageAttribute()
    {
        return (($this->salling_price-$this->price)*100);
    }
    public function getAbbreviatedIngredientsAttribute()
    {
        return substr($this->ingredients,0,20).".....";
    }
    /**
     * Get the company that owns the Drug
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    /**
     * Get the country that owns the Drug
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    /**
     * Get the drugDosage that owns the Drug
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function drugDosage(): BelongsTo
    {
        return $this->belongsTo(DrugDosage::class, 'drug_dosage_id');
    }
    /**
     * Get the Currency that owns the Drug
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
    /**
     * Get the Package that owns the Drug
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
    /**
     * Get the Package that owns the Drug
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function laboratory(): BelongsTo
    {
        return $this->belongsTo(Laboratory::class, 'laboratory_id');
    }
     /**
     * Get the Package that owns the Drug
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function strata(): BelongsTo
    {
        return $this->belongsTo(Stratum::class, 'strata_id');
    }
     /**
     * Get the Package that owns the Drug
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class, 'route_id');
    }



}
