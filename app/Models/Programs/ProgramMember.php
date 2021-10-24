<?php

namespace App\Models\Programs;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class ProgramMember extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'program_members';
    protected $fillable = [
        'program_id',
        'user_id',
        'member_type_id',
        'status'
    ];

    const MEMBERSHIP_ACTIVE = 'active';
    const MEMBERSHIP_REVOVED = 'revoked';

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status',self::MEMBERSHIP_ACTIVE);
    }
    public function programs(): HasMany
    {
        return $this->hasMany(Project::class,'id','program_id');
    }

    public function memberTypes(): HasMany
    {
        return $this->hasMany(ProgramMemberType::class,'id','member_type_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class,'id','user_id');
    }
}
