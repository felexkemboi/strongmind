<?php

namespace App\Models\Programs;

use App\Models\Misc\ProgramType;
use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'programs';

    protected $fillable = [
        'name',
        'office_id',
        'program_code',
        'program_type_id',
        'member_count',
        'colour_option',
    ];

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class, 'office_id');
    }

    public function programType(): BelongsTo
    {
        return $this->belongsTo(ProgramType::class, 'program_type_id');
    }
}
