<?php

namespace App\Models;

use App\Models\Misc\Channel;
use App\Models\Misc\Status;
use App\Models\Programs\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Spatie\Activitylog\Traits\LogsActivity;

class Client extends Model
{
    use HasFactory, SoftDeletes,LogsActivity;

    /**
     * @var string $table
     */
    protected $table = 'clients';
    /**
     * @var array $fillable
     */
    protected $fillable = [
        'name',
        'patient_id',
        'phone_number',
        'country_id',
        'gender',
        'region',
        'city',
        'timezone_id',
        'languages',
        'age',
        'client_type',
        'therapy',
        'status_id',
        'channel_id',
        'staff_id',
        'active',
    ];

    protected static $logAttributes = ['client_type','staff_id','name','therapy','patient_id','phone_number','city','languages','status_id','channel_id','active'];

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;


    const SCREENING_CLIENT_TYPE = 'screening'; //previously inbound
    const THERAPY_CLIENT_TYPE = 'therapy'; //previously main

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active',true);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeScreening(Builder $query): Builder
    {
        return $query->where('client_type',self::SCREENING_CLIENT_TYPE);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeTherapy(Builder $query): Builder
    {
        return $query->where('client_type',self::THERAPY_CLIENT_TYPE);
    }

    /**
     * @return BelongsTo
     */
    public function timezone(): BelongsTo
    {
        return $this->belongsTo(Timezone::class,'timezone_id');
    }

    /**
     * @return BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class,'country_id');
    }

    /**
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class,'status_id');
    }

    /**
     * @return BelongsTo
     */
    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class,'channel_id');
    }

    /**
     * @return BelongsTo
     */
    public function staff(): BelongsTo
    {
        return $this->belongsTo(User::class,'staff_id');
    }

    /**
     * @return HasMany
     */
    public function notes(): HasMany
    {
        return $this->hasMany(ClientNote::class,'client_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function bioData(): BelongsTo
    {
        return $this->belongsTo(ClientBioData::class,'id','client_id');
    }

    public function getLanguagesAttribute($value)
    {
        return explode(',', $value);
    }

    // public function delete()
    // {
    //     $this->bioData()->delete();

    //     return parent::delete();
    // }
}
