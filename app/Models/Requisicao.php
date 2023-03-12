<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisicao extends Model
{
    use HasFactory;

    protected $table = 'requisicoes';
    protected $fillable = ['id'];

    public function listagemProdutos()
    {
        return $this->hasMany(ListagemProdutos::class);
    }
}
