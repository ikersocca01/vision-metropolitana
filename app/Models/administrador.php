<?php


namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model implements Authenticatable
{
    use HasFactory;

    // Campos de la tabla que pueden ser llenados
    protected $fillable = ['username', 'password_hash'];

    // Si no usas los timestamps, desactívalos
    public $timestamps = false;

    // El campo que usas como identificador para la autenticación
    public function getAuthIdentifierName()
    {
        return 'username';  // Cambia esto si usas otro campo
    }

    // El valor que se usa para autenticar al usuario
    public function getAuthIdentifier()
    {
        return $this->username;  // Usamos 'username' para la autenticación
    }

    // El campo de la contraseña
    public function getAuthPassword()
    {
        return $this->password_hash;  // 'password_hash' es el campo de la contraseña
    }

    // Si no usas remember_token, no es necesario implementarlo, pero si lo deseas:
    public function getRememberToken()
    {
        return null;  // No implementado, ya que no utilizamos remember_token
    }

    public function setRememberToken($value)
    {
        // No lo necesitamos, pero es obligatorio en Authenticatable
    }

    public function getRememberTokenName()
    {
        return null;  // No lo necesitamos
    }

    public function getAuthPasswordName()
    {
        // TODO: Implement getAuthPasswordName() method.
    }
}
