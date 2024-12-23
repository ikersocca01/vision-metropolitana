<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $table = 'notas';
    protected $fillable = [
        'nombre_corto',
        'estado',
        'titulo',
        'encabezado',
        'imagen',
        'categoria',
        'contenido',
    ];

    // Definir los campos que no deben ser asignados masivamente
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
