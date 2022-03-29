<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\QuestionOptions;

class QuestionResponses extends Model
{
    use HasFactory;

    protected $table = 'questionresponses';

    protected $fillable = [
        'value',
        'question_id',
        'option_id',
        'client_id',
        'score',
        'session_id',
        'group_id',
        'status_id'
    ];

    public function Question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function Option(): hasMany
    {
        return $this->hasMany(QuestionOptions::class, 'option_id');
    }

    public function Client(): BelongsTo
    {
        return $this->belongsTo(Form::class, 'client_id');
    }
}
