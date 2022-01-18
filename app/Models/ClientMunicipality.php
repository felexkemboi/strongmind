<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientMunicipality extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'client_municipalities';

    protected $fillable = [
        'name',
        'slug',
        'district_id',
    ];

    /**
     * @return BelongsTo
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(ClientDistrict::class,'district_id');
    }
}
