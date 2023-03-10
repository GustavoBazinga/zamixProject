<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Estoque extends Model
{
    use HasFactory;
    protected $table = 'estoques';
    protected $primaryKey = 'id';
    protected $fillable = ['quantidadeRebecimento', 'quantidadeRestante', 'produto'];


    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
