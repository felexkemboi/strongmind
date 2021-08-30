<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramMemberWaitingList extends Model
{
    use HasFactory;

    protected $table = 'program_member_waiting_lists';

    protected $fillable = [
        'email',
        'invite_id',
        'program_id',
        'member_type_id'
    ];
}
