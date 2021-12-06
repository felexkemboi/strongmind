<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupClient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'group_clients';
    protected $fillable = [
        'group_id',
        'client_id'
    ];

    /**'
     * @return BelongsTo
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class,'group_id');
    }

    /**
     * @return HasMany
     */
    public function clients(): HasMany
    {
        return $this->hasMany(Client::class,'client_id');
    }
}
