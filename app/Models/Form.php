<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Misc\Status;


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
        'assessment',
        'form_id',
        'published_at'
    ];
    protected $appends = ['status'];

    /**
     * @return HasMany
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class,'form_id','id')->orderBy('created_at');
    }

    /**
     * @return HasMany
     */
    public function questionResponses(): HasMany
    {
        return $this->hasMany(QuestionResponses::class);
    }
    /**
     * @return BelongsTo
     */
    public function getStatusAttribute(): BelongsTo
    {
        return $this->belongsTo(Status::class,'status_id');
    }
}
