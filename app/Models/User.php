<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Los atributos que se pueden asignar masivamente.
     */
    protected $fillable = [
        'rut',
        'nombre',
        'apellido',
        'email',
        'password'
    ];

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
        'password' => 'hashed',
    ];
}
