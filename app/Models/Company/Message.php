<?php

namespace App\Models\Company;

use App\Models\Management\Company;
use Filament\Facades\Filament;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

class Message extends Model implements HasTenants
{
    use HasFactory;

    protected $fillable= [
        'name',
        'email',
        'reason',
        'forall',
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

        self::addGlobalScope('for_logged_member', function(Builder $builder): void {
            if (auth()->guard('member')->check()) {
                $user = auth()->user(); // Obtener el usuario logueado
                $email = $user->email;
                $tenantId = Filament::getTenant()->id;

                $builder->where(function ($query) use ($email, $tenantId) {
                    $query->where('company_id', $tenantId)
                        ->where('forall', 1)
                        ->orWhere('email', $email);
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

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class)->withPivot('member_id');
    }
}
