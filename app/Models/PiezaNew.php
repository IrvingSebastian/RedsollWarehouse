<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PiezaNew extends Model
{
    use HasFactory;

    static $rules = [
        'pieza_id' => 'required',
        'user_id' => 'required',
        'salida' => 'required',
        'entrada' => 'required',
        'devolucion' => 'required',
    ];

    protected $perPage = 5;

    protected $fillable = ['pieza_id', 'user_id', 'entrada','salida', 'devolucion'];

    public function piezas()
    {
        return $this->hasMany(Pieza::class, 'id', 'pieza_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
