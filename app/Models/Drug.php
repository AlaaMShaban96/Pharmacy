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
 * @version March 30, 2022, 7:47 pm UTC
 *
 * @property string $ATC
 * @property string $name
 * @property string $B_G
 * @property string $ingredients
 * @property integer $drug_dosage_id
 * @property integer $company_id
 */
class Drug extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'drugs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'ATC',
        'name',
        'B_G',
        'ingredients',
        'drug_dosage_id',
        'company_id',
        'price',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ATC' => 'string',
        'name' => 'string',
        'B_G' => 'string',
        'ingredients' => 'string',
        'drug_dosage_id' => 'integer',
        'company_id' => 'integer',
        'price'=> 'double',

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

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
