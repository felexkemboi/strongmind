<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'client_form';
    protected $fillable = [
        'client_id',
        'form_id',
        'status',
        'score'
    ];

    /**'
     * @return BelongsTo
     */
    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class,'group_id');
    }

    /**'
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
