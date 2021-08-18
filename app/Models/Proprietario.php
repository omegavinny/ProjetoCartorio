<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietario extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function imoveis()
    {
        return $this->belongsToMany(Imovel::class, 'imovel_proprietario');
    }
}
