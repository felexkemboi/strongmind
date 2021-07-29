<?php

namespace App\Models\Programs;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class,'program_id');
    }

    public function memberType(): BelongsTo
    {
        return $this->belongsTo(ProgramMemberType::class,'member_type_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
