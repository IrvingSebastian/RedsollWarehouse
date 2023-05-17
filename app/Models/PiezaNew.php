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
    ];

    protected $perPage = 5;

    protected $fillable = ['pieza_id', 'user_id', 'entrada','salida'];

    public function piezas()
    {
        return $this->hasOne(Pieza::class, 'id', 'pieza_id');
    }

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
