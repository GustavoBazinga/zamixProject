<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Lote extends Model
{
    use HasFactory;
    protected $table = 'lotes';
    protected $fillable = ['produto_id', 'quantidadeRecebida', 'precoLote'] ;

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
