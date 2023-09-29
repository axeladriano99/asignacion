<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tarea
 *
 * @property $id
 * @property $nombre
 * @property $Fecha_inicio
 * @property $fecha_creacion
 * @property $fecha_termino
 * @property $descripcion
 * @property $idEstado
 * @property $idCreador
 * @property $idUsuario
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tarea extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'Fecha_inicio' => 'required',
		//'fecha_creacion' => 'required',
		'fecha_termino' => 'required',
		'descripcion' => 'required',
		'idEstado' => 'required',
		'idUsuario' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','Fecha_inicio','fecha_creacion','fecha_termino','descripcion','idEstado','idCreador','idUsuario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'idEstado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'idUsuario');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'idCreador');
    }
    

}
