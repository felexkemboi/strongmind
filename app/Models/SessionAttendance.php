<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SessionAttendance extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'session_attendances';

    protected $fillable = [
        'session_id',
        'client_id',
        'attended',
        'reason'
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(GroupSession::class,'session_id');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
