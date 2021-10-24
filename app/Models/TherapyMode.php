<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapyMode extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'therapy_mode';

    protected $guarded = [];

    protected $fillable = [
        'name'
    ];
}
