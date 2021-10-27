<?php

namespace App\Models;

use App\Models\Misc\ProgramType;
use App\Models\Programs\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientBioData extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'client_bio_data';

    /**
     * @var string[]
     */
    protected $fillable = [
        'client_id',
        'first_name',
        'last_name',
        'other_name',
        'nick_name',
        'nationality',
        'project_id',
        'education_level_id',
        'marital_status_id',
        'phone_ownership_id',
        'is_disabled',
        'district_id',
        'province_id',
        'parish_ward_id',
        'village_id',
        'sub_county_id',
        'program_type_id'
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
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class,'project_id');
    }

    /**
     * @return BelongsTo
     */
    public function education(): BelongsTo
    {
        return $this->belongsTo(ClientEducationLevel::class,'education_level_id');
    }

    /**
     * @return BelongsTo
     */
    public function maritalStatus(): BelongsTo
    {
        return $this->belongsTo(ClientMaritalStatus::class,'marital_status_id');
    }

    /**
     * @return BelongsTo
     */
    public function phoneOwnership(): BelongsTo
    {
        return $this->belongsTo(ClientPhoneOwnership::class,'phone_ownership_id');
    }

    /**
     * @return BelongsTo
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(ClientDistrict::class,'district_id');
    }

    /**
     * @return BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(ClientMunicipality::class,'province_id');
    }

    /**
     * @return BelongsTo
     */
    public function ward(): BelongsTo
    {
        return $this->belongsTo(ClientParish::class,'parish_ward_id');
    }

    /**
     * @return BelongsTo
     */
    public function village(): BelongsTo
    {
        return $this->belongsTo(ClientVillage::class,'village_id');
    }

    /**
     * @return BelongsTo
     */
    public function programType(): BelongsTo
    {
        return $this->belongsTo(ProgramType::class,'program_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function subCounty(): BelongsTo
    {
        return $this->belongsTo(ClientSubCounty::class,'sub_county_id');
    }
}
