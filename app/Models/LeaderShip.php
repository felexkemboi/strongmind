<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaderShip extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'leadership';

    protected $guarded = [];

    protected $fillable = [
        'name'
    ];
}
