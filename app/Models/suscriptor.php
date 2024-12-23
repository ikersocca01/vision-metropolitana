<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suscriptor extends Model
{
    //
    use HasFactory;
    protected $table = 'suscriptor';

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'correo',
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
    //     return $this->belongsTo(OtherModel::class);
    // }
}
