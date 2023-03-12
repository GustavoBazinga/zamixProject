<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisicao extends Model
{
    use HasFactory;

    protected $table = 'requisicaos';
    protected $fillable = ['id', 'status', 'funcionario_id'];

    public function listagemProdutos()
    {
        return $this->hasMany(ListagemProdutos::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
