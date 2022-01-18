<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupType extends Model
{
    use HasFactory;

    /**
     * @var string $table
     */
    protected $table = 'group_type';

    protected $guarded = [];

    protected $fillable = [
        'name'
    ];
}
