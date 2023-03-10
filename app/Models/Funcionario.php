<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    protected $table = 'funcionarios';
    protected $primaryKey = 'id';
    protected $fillable = ['nome', 'cpf'];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'funcionario_produto', 'funcionario_id', 'produto_id')->withPivot('quantidade');
    }

}
