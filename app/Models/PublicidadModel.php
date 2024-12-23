<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicidadModel extends Model
{
    //
    use HasFactory;
    protected $table = 'publicidad';

    // Definir los campos que pueden ser asignados masivamente (mass assignable)
    protected $fillable = [
        'nombre_corto',
        'estado',
        'imagen',
    ];

    // Definir los campos que no deben ser asignados masivamente (guardados automáticamente)
    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];

    // Cambiar los nombres de las fechas si es necesario
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // Relación con otros modelos (si la tuviera)
    // public function otraRelacion() {
    //     return $this->hasMany(OtherModel::class);
    // }
}
