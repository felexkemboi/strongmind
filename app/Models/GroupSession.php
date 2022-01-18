<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupSession extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'group_sessions';

    /**
     * @var string[]
     */
    protected $fillable = [
        'session_date',
        'total_clients',
        'total_present',
        'group_id'
    ];

    /**
     * @return BelongsTo
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class,'group_id');
    }

    public function attendance(): HasMany
    {
        return $this->hasMany(SessionAttendance::class,'session_id','id');
    }
}
