<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory,SoftDeletes;

    /**
     * @var string $table
     */
    protected $table = 'forms';

    protected $fillable = [
        'name',
        'status_id',
        'published_at'
    ];
}
