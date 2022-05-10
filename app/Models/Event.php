<?php

namespace App\Models;

use App\Models\User;
use Eloquent as Model;
use App\Models\Company;
use App\Models\EventType;
use App\Models\EventLocation;
use App\Models\EventMaterial;
use App\Models\EventSpecialty;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Event
 * @package App\Models
 * @version April 30, 2022, 2:05 pm UTC
 *
 * @property string $name
 * @property number $event_specialty_id
 * @property number $event_location_id
 * @property number $event_number
 * @property string $event_date
 * @property number $visitors_number
 * @property string $event_food_location
 * @property string $event_spicy_food_location
 * @property string $event_sweet_food_location
 * @property number $media_company_id
 * @property number $decoration_company_id
 * @property string $medical_representative
 * @property time $event_time
 * @property number $event_cost
 * @property number $user_id
 */
class Event extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'events';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'supplier_name',
        'event_type_id',
        'event_specialty_id',
        'event_location_id',
        'event_number',
        'event_date',
        'visitors_number',
        'event_food_location',
        'event_spicy_food_location',
        'event_sweet_food_location',
        'media_company_id',
        'decoration_company_id',
        'medical_representative',
        'event_time',
        'event_cost',
        'user_id',
        'event_start',
        'event_close'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'event_date' => 'date',
        'event_food_location' => 'string',
        'event_spicy_food_location' => 'string',
        'event_sweet_food_location' => 'string',
        'medical_representative' => 'string',
        'event_cost' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'event_specialty_id' => 'required',
        'event_location_id' => 'required',
        'event_number' => 'required',
        'event_date' => 'required',
        'media_company_id' => 'required',
        'decoration_company_id' => 'required',
        'event_cost' => 'required',
        'user_id' => 'required'
    ];

    /**
     * Get the event_specialty that owns the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventSpecialty(): BelongsTo
    {
        return $this->belongsTo(EventSpecialty::class, 'event_specialty_id');
    }
    /**
     * Get the event_type_id that owns the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventType(): BelongsTo
    {
        return $this->belongsTo(EventType::class, 'event_type_id');
    }
    /**
     * Get the event_location_id that owns the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventLocation(): BelongsTo
    {
        return $this->belongsTo(EventLocation::class, 'event_location_id');
    }
    /**
     * Get the media_company that owns the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mediaCompany(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'media_company_id');
    }
     /**
     * Get the decoration_company that owns the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function decorationCompany(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'decoration_company_id');
    }
    /**
     * Get the user that owns the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * The materials that belong to the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function materials(): BelongsToMany
    {
        return $this->belongsToMany(EventMaterial::class, 'events_materials', 'event_id', 'event_material_id')->withPivot('count');
    }
}
