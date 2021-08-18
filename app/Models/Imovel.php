<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;

    protected $table = 'imoveis';

    protected $guarded = [];

    public function proprietarios()
    {
        return $this->belongsToMany(Proprietario::class, 'imovel_proprietario');
    }

}
