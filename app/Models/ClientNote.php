<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientNote extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string $table
     */
    protected $table = 'client_notes';

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'client_id',
        'private',
        'staff_id',
        'notes'
    ];

    /**
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    /**
     * @return BelongsTo
     */
    public function staff(): BelongsTo
    {
        return $this->belongsTo(User::class,'staff_id');
    }
}
