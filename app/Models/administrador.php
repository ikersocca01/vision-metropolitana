<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administrador extends Model
{
    //
    use HasFactory;
    protected $table = 'administrador';

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'username',
        'password_hash',
    ];

    // Definir los campos que no deben ser asignados masivamente
    protected $guarded = [
        'id', 'created_at',
    ];

    // Cambiar los nombres de las fechas si es necesario
    const CREATED_AT = 'created_at';
    const UPDATED_AT = null; // No hay campo 'updated_at' en esta tabla

    // Relación con otros modelos (si la tuviera)
    // public function otraRelacion() {
    //     return $this->hasMany(OtherModel::class);
    // }

    // Si usas hash de contraseñas, puedes agregar métodos para manejo de contraseñas
    public function setPasswordAttribute($password)
    {
        $this->attributes['password_hash'] = bcrypt($password);
    }
}
