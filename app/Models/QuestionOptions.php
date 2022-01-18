<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Question;

class QuestionOptions extends Model
{
    use HasFactory;

    protected $table = 'questionsoptions';

    protected $fillable = [
        'value',
        'score',
        'question_id',
    ];

    public function Question(): BelongsTo
    {
        return $this->belongsTo(FormType::class, 'question_id');
    }
}


