<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pieza
 *
 * @property $id_productos
 * @property $codigo
 * @property $descripcion
 * @property $entradas
 * @property $salidas
 * @property $stock
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pieza extends Model
{  
    static $rules = [
      'codigo' => 'required',
      'descripcion' => 'required',
      'entradas' => 'required',
      'salidas' => 'required',
      'stock' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['codigo','descripcion','entradas','salidas','stock', 'devolucion'];

    public function entradas1()
    {
        return $this->hasMany(P_Entradas::class, 'id_pieza', 'id');
    }

    public function salidas1()
    {
        return $this->hasMany(P_Salidas::class, 'id_pieza', 'id');
    }

    public function devoluciones()
    {
        return $this->hasMany(P_Devoluciones::class, 'id_pieza', 'id');
    }
}
