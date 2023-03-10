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

    public function requisicoes()
    {
        return $this->hasMany(Requisicao::class);
    }


}
