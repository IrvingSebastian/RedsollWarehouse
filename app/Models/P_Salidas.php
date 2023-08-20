<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class P_Salidas extends Model
{
    static $rules = [
        'id_pieza' => 'required',
        'id_user' => 'required',
        'cantidad' => 'required',
    ];
  
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_pieza','id_user','cantidad'];

    public function Pieza()
    {
        return $this->belongsTo(Pieza::class, 'id_pieza', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
