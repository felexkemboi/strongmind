<?php

namespace App\Models\Programs;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramMember extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'program_members';
    protected $fillable = [
        'program_id',
        'user_id',
        'member_type_id'
    ];

    const MEMBERSHIP_ACTIVE = 'active';
    const MEMBERSHIP_REVOVED = 'revoked';

    public function programs(): HasMany
    {
        return $this->hasMany(Program::class,'id','program_id');
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
