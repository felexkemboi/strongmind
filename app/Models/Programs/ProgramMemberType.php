<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramMemberType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'program_member_types';
    protected $fillable = [
        'name'
    ];
}
