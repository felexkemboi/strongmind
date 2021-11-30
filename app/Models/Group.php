<?php

namespace App\Models;

use App\Models\Programs\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Misc\GroupType;

class Group extends Model
{
    use HasFactory, SoftDeletes;

    public const SESSION_ONGOING = true;
    public const SESSION_TERMINATED = false;

    protected $table = 'groups';

    protected $fillable = [
        'name',
        'group_type_id',
        'last_session',
        'staff_id',
        'ongoing',
        'group_id',
        'office_id',
        'project_id',
        'cycle_id',
        'fascilitator_id',
        'supervisor_id',
        'therapy_mode_id',
        'mode_of_delivery_id',
        'group_allocation_date'
    ];

    /**
     * @return BelongsTo
     */
    public function groupType(): BelongsTo
    {
        return $this->belongsTo(GroupType::class,'group_type_id');
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
    public function sessions(): HasMany
    {
        return $this->hasMany(GroupSession::class, 'id', 'group_id');
    }

    /**
     * @return BelongsTo
     */
    public function therapyMode(): BelongsTo
    {
        return $this->belongsTo(TherapyMode::class,'therapy_mode_id');
    }

    /**
     * @return BelongsTo
     */
    public function deliveryMode(): BelongsTo
    {
        return $this->belongsTo(ModeOfDelivery::class,'mode_of_delivery_id');
    }

    /**
     * @return BelongsTo
     */
    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(User::class,'supervisor_id');
    }

    /**
     * @return BelongsTo
     */
    public function fascilitator(): BelongsTo
    {
        return $this->belongsTo(User::class,'fascilitator_id');
    }

    /**
     * @return BelongsTo
     */
    public function cycle(): BelongsTo
    {
        return $this->belongsTo(Cycle::class,'cycle_id');
    }

    /**
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class,'project_id');
    }

    /**
     * @return BelongsTo
     */
    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class,'office_id');
    }
}
