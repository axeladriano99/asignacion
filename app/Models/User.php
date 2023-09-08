<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $apellidoPaterno
 * @property string $apellido_Materno
 * @property string $email
 * @property int $DNI
 * @property string $cargo
 * @property int $idArea
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Area $area
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class User extends Authenticatable
{

    
    static $rules = [
		'name' => 'required',
		'apellidoPaterno' => 'required',
		'apellido_Materno' => 'required',
		'email' => 'required',
		'DNI' => 'required',
		'cargo' => 'required',
		'idArea' => 'required',
        'password' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','apellidoPaterno','apellido_Materno','email','DNI','cargo','idArea','password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'id', 'idArea');
    }
    

}
