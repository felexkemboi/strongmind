<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModeOfDelivery extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'modes_of_delivery';

    protected $fillable = [
        'name',
        'slug'
    ];
}
