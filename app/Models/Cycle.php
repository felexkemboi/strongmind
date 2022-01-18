<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cycle extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string $table
     */
    protected $table = 'cycle';

    protected $fillable = [
        'name',
        'cycle_code',
        'year'
    ];
}
