<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


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
        'form_id',
        'published_at'
    ];

    /**
     * @return HasMany
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class,'form_id','id');
    }
}
