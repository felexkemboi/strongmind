<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Form;
use App\Models\FormType;
use App\Models\FieldType;
use App\Models\QuestionOptions;
use App\Models\QuestionResponses;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $with = ['fieldType','responses', 'questionOptions'];

    protected $fillable = [
        'description',
        'form_id',
        'field_type_id',
        'required',
        'question_options_id',
        'multiple_selection',
    ];


    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class, 'form_id');
    }

    public function formType(): BelongsTo
    {
        return $this->belongsTo(FormType::class, 'form_type_id');
    }

    public function responses(): HasMany
    {
        return $this->hasMany(QuestionResponses::class, 'question_id');
    }

    public function fieldType(): BelongsTo
    {
        return $this->belongsTo(FieldType::class, 'field_type_id');
    }

    public function questionOptions(): HasMany
    {
        return $this->hasMany(QuestionOptions::class, 'question_id');
    }

    public function getQuestionOptionsAttribute() {
        return $this->hasMany(QuestionOptions::class, 'question_id');
    }
}
