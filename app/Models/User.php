<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Los atributos que se pueden asignar masivamente.
     */
    protected $fillable = [
        'rut',
        'nombre',
        'apellido',
        'email',
        'password',
        'role' // admin, user, etc.
    ];
    /**
     * Verifica si el usuario tiene el rol indicado.
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * Los atributos que deben estar ocultos en serialización.
     */
    protected $hidden = [
        'password',
        'remember_token', // opcional, puedes dejarlo si no usas login
    ];

    /**
     * Los atributos que deben ser casteados automáticamente.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
