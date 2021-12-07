<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Form;
use App\Models\FormType;
use App\Models\QuestionOptions;

class Question extends Model
{
    use HasFactory;//, SoftDeletes;

    protected $table = 'questions';

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
        return $this->belongsTo(FormType::class, 'field_type_id');
    }

    public function questionOptions(): HasMany
    {
        return $this->hasMany(QuestionOptions::class, 'question_options_id');
    }
}
