<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

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
     * @param \Illuminate\Database\Eloquent\Builder $queryBuilder
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePrivate(\Illuminate\Database\Eloquent\Builder $queryBuilder, Request $request): \Illuminate\Database\Eloquent\Builder
    {
        return $queryBuilder->where('private', true)->where(function($query) use($request){
            $query->where('staff_id', $request->user()->id);
        });
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublic(\Illuminate\Database\Eloquent\Builder $query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('private', false);
    }

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
