<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuncionarioProduto extends Model
{
    use HasFactory;

    protected $table = 'funcionario_produto';
    protected $fillable = ['funcionario_id', 'produto_id', 'quantidade'];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

}
