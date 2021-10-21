<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Misc\GroupType;

class Group extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'groups';

    protected $fillable = [
        'name',
        'group_type_id',
        'last_session',
        'staff_id',
        'ongoing'
    ];

    public function groupType(): BelongsTo
    {
        return $this->belongsTo(GroupType::class,'group_type_id');
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(User::class,'staff_id');
    }
}
