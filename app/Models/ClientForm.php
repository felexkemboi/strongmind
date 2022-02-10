<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientForm extends Model
{
    use HasFactory; //, SoftDeletes;

    protected $table = 'client_form';
    protected $fillable = [
        'client_id',
        'form_id',
        'status',
        'score'
    ];
    protected $appends = ['form_name'];
    protected $hidden = ['form'];


    /**'
     * @return BelongsTo
     */
    public function getFormNameAttribute()
    {
        return $this->form->name;
    }

    /**'
     * @return BelongsTo
     */
    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class,'form_id');
    }

    /**'
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
