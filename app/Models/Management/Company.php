<?php

namespace App\Models\Management;

use App\Models\Company\Diet;
use App\Models\Company\Member;
use App\Models\Company\Plan;
use App\Models\Company\Routine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'address'
    ];

    public function customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class);
    }

    public function diets(): HasMany
    {
        return $this->hasMany(Diet::class);
    }

    public function routines(): HasMany
    {
        return $this->hasMany(Routine::class);
    }

    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class);
    }
}
