<?php

namespace App\Models;

use Eloquent as Model;
use App\Models\Company;
use App\Models\DrugDosage;
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
        'ingredients',
        'drug_dosage_id',
        'company_id',
        'price'
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
        'package' => 'string',
        'b_g' => 'string',
        'Ingredients' => 'string',
        'price' => 'float',
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
        'package' => 'required',

        'b_g' => 'required',
        'ingredients' => 'required',
        'drug_dosage_id' => 'required',
        'company_id' => 'required',
        'price' => 'required'
    ];
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
     * Get the drugDosage that owns the Drug
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function drugDosage(): BelongsTo
    {
        return $this->belongsTo(DrugDosage::class, 'drug_dosage_id');
    }



}
