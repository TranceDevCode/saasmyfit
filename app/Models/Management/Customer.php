<?php

namespace App\Models\Management;

use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable implements HasTenants
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $with = [
        'companies',
        //'roles',
        //'permissions'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        //'role_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //relacion de los Customers con las empreas
    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class);
    }


    public function canAccessTenant(Model $tenant): bool
    {
        //
        return $this->companies->contains($tenant);
    }

    public function getTenants(Panel $panel): array|Collection
    {
        //Empresas que va a gestionar o que tiene este usuario
        return $this->companies;
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    //Relacion inversa que hacemos en el modelo de Permissions
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasPermission(string $permission): bool
    {
        return $this->permissions->contains('name', $permission);
    }

    public function hasRole(string $role): bool
    {
        return $this->roles->contains('name', $role);
    }

    //Determina si el usuario tiene alguno de esos roles, saber si un usuario es un admin u trabajador
    public function hasAnyRole(array $roles): bool
    {
        return $this->roles->whereIn('name', $roles)->isNotEmpty();
    }

    //Se usa para los casos en que los usuarios no tenga ningun role, pero si tendra algun permiso
    public function hasRoles(): bool
    {
        return $this->roles->isNotEmpty();
    }
}
