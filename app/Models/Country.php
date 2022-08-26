<?php

namespace App\Models;
use App\Models\RegionDistrict;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    protected $guarded = [];
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    /**
     * Scope a query to only include active users.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('active', 1);
    }

    /**
     * @return BelongsTo
     */
    public function regionsDistricts():HasMany
    {
        return $this->hasMany(RegionDistrict::class);

    }

}
