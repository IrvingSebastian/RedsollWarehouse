<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PiezaNew extends Model
{
    use HasFactory;

    static $rules = [
        'pieza_id' => 'required',
        'salida' => 'required',
        'entrada' => 'required',
    ];

    protected $perPage = 5;

    protected $fillable = ['pieza_id', 'entrada','salida'];
}
