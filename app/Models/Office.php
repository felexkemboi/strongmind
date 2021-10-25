<?php

namespace App\Models;

use App\Models\Programs\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Office extends Model
{
    protected $guarded = [];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function programs(): HasMany
    {
        return $this->hasMany(Project::class, 'office_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($office) {
            $relationMethods = ['members', 'programs'];

            foreach ($relationMethods as $relationMethod) {
                if ($office->$relationMethod()->count() > 0) {
                    return false;
                }
            }
        });
    }
}
