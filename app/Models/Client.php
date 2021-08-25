<?php

namespace App\Models;

use App\Models\Misc\Channel;
use App\Models\Misc\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

class Client extends Model
{
    use HasFactory, SoftDeletes;

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
        'active'
    ];

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
        return $query->where('client_type','screening');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeTherapy(Builder $query): Builder
    {
        return $query->where('client_type','therapy');
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
}
