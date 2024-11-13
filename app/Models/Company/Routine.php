<?php

namespace App\Models\Company;

use App\Models\Management\Company;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Routine extends Model implements HasTenants
{
    use HasFactory;

    protected $fillable = [
        'name',
        'timesperweek',
        'company_id'
    ];

    protected static function booted(): void
    {
        self::addGlobalScope('for_logged_company', function (Builder $builder): void {
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
                    $company = $companies->first(); // Suponiendo que un usuario solo pertenezca a una empresa
                    $companyId = $company->id; // Obtiene el ID de la empresa
                    // Realiza las operaciones que necesitas con $companyId
                }
            }
        });

        self::addGlobalScope('for_logged_member', function (Builder $builder): void {
            /*
                Se aplicará siempre que el usuario esté utilizando el guard 'rider'.
            */
            if (auth()->guard('member')->check()) {
                $user = auth()->user(); // Obtiene el usuario logeado
                $userId = $user->id; // Obtiene el ID del usuario logeado
                $builder->whereHas('members', function ($query) use ($userId) {
                    $query->where('member_id', $userId);
                });
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

    public function companies(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function getTenants(Panel $panel): array|Collection
    {
        return $this->companies;
    }

    public function canAccessTenant(Model $tenant): bool
    {
        return $this->companies->contains($tenant);
    }
}
