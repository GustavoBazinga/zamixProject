<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estoque;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $primaryKey = 'id';
    protected $fillable = ['nome', 'precoCusto', 'precoVenda'];

    public function estoques()
    {
        return $this->hasMany(Estoque::class);
    }
}
