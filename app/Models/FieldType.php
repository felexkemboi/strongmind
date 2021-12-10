<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class FieldType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'field_type';

    protected $fillable = [
        'name',
        'data_type',
    ];
}
