<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientMaritalStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'client_marital_statuses';

    protected $fillable = [
        'name',
        'slug'
    ];
}
