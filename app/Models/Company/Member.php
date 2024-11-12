<?php

namespace App\Models\Company;

use App\Models\Management\Commune;
use App\Models\Management\Company;
use App\Models\Management\Country;
use App\Models\Management\Region;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;

class Member extends Authenticatable implements HasTenants
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'rut',
        'address',
        'country_id',
        'region_id',
        'commune_id',
        'telephone',
        'active',
        'password',
        'sex',
        'birthday',
        'profesion',
        'experience',
        'activitylevel',
        'size',
        'weight',
        'imc',
        'avaragefat',
        'target',
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function booted(): void
    {
        self::addGlobalScope('for_logged_company', function(Builder $builder):void {
            /*
            se aplicara siempre que el usuario este utilizando el guard rider
            En ese caso todas las consultas van a ir por el rider_id, por el usuario identificado,
            es decir que solo vera su informacion correspondiente, ademas del filtro de tenant
            que ya se aplica con filament multi-tenancy
            */
            if (auth()->guard('company')->check()) {
                $user = auth()->user(); // Obtiene el usuario logeado
                $companies = $user->companies; // Obtiene la relación "companies" del usuario

                if ($companies->count() > 0) {
                    $company = $companies->first(); // Suponiendo que un alumno solo pertenezca a una empresa
                    $companyId = $company->id; // Obtiene el ID de la empresa
                    // Realiza las operaciones que necesitas con $companyId
                }
            }
        });

        /*
        Se guardara automaticamente el rider_id en la tabla, obtenido del usuario logeado,
        esto permite que no tengamos que pedirlo en el resource
        */
        self::saving(function (self $company): void {
            if (auth()->guard('company')->check()) {
                $user = auth()->user(); // Obtener el usuario logeado
                $companies = $user->companies; // Obtener las compañías relacionadas con el usuario

                if ($companies->count() > 0) {
                    $company = $companies->first(); // Suponemos que el usuario pertenece a una sola compañía
                    $company->company_id = $company->id; // Asignar el ID de la compañía al modelo de routine
                }
            }
        });
    }

    public function companies():BelongsToMany
    {
        return $this->belongsToMany(Company::class);
    }

    public function getTenants(Panel $panel): array|Collection
    {
        return $this->companies;
    }

    public function canAccessTenant(Model $tenant): bool
    {
        return $this->companies->contains($tenant);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function commune(): BelongsTo
    {
        return $this->belongsTo(Commune::class);
    }

}
