<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientEducationLevel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'client_education_levels';

    protected $fillable = [
        'name',
        'slug'
    ];
}
