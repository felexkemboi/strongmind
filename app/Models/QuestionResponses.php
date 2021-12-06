<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Client;
use App\Models\FormType;
use App\Models\QuestionOptions;

class QuestionResponses extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'value',
        'question_id',
        'option_id',
        'client_id',
    ];

    public function Question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function Option(): BelongsTo
    {
        return $this->hasMany(QuestionOptions::class, 'option_id');
    }

    public function Client(): BelongsTo
    {
        return $this->belongsTo(Form::class, 'client_id');
    }
}
