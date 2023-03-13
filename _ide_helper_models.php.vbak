<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Funcionario
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ListagemProdutos> $listagemProdutos
 * @property-read int|null $listagem_produtos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereCpf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Funcionario whereUpdatedAt($value)
 */
	class Funcionario extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ListagemProdutos
 *
 * @property int $produto_id
 * @property int $produto_composto_id
 * @property int $requisicao_id
 * @property int $quantidade
 * @property int|null $status
 * @property int|null $funcionario_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Funcionario|null $funcionario
 * @property-read \App\Models\Produto $produto
 * @property-read \App\Models\ProdutoComposto $produtoComposto
 * @property-read \App\Models\Requisicao $requisicao
 * @method static \Database\Factories\ListagemProdutosFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ListagemProdutos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListagemProdutos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ListagemProdutos query()
 * @method static \Illuminate\Database\Eloquent\Builder|ListagemProdutos whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListagemProdutos whereFuncionarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListagemProdutos whereProdutoCompostoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListagemProdutos whereProdutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListagemProdutos whereQuantidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListagemProdutos whereRequisicaoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListagemProdutos whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ListagemProdutos whereUpdatedAt($value)
 */
	class ListagemProdutos extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Lote
 *
 * @property int $id
 * @property int $quantidadeRecebida
 * @property float $precoLote
 * @property int|null $produto_id
 * @property int|null $produto_composto_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Produto|null $produto
 * @property-read \App\Models\ProdutoComposto|null $produtoComposto
 * @method static \Database\Factories\LoteFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Lote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lote query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lote wherePrecoLote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lote whereProdutoCompostoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lote whereProdutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lote whereQuantidadeRecebida($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lote whereUpdatedAt($value)
 */
	class Lote extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Produto
 *
 * @property int $id
 * @property string $nome
 * @property float $precoCusto
 * @property float $precoVenda
 * @property int $quantidade
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lote> $lotes
 * @property-read int|null $lotes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProdutoComposto> $produtosCompostos
 * @property-read int|null $produtos_compostos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Requisicao> $requisicoes
 * @property-read int|null $requisicoes_count
 * @method static \Database\Factories\ProdutoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Produto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Produto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto wherePrecoCusto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto wherePrecoVenda($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereQuantidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Produto whereUpdatedAt($value)
 */
	class Produto extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProdutoComposto
 *
 * @property int $id
 * @property string $nome
 * @property float $precoCusto
 * @property float $precoVenda
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lote> $lotes
 * @property-read int|null $lotes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Produto> $produtos
 * @property-read int|null $produtos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Requisicao> $requisicoes
 * @property-read int|null $requisicoes_count
 * @method static \Database\Factories\ProdutoCompostoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoComposto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoComposto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoComposto query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoComposto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoComposto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoComposto whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoComposto wherePrecoCusto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoComposto wherePrecoVenda($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoComposto whereUpdatedAt($value)
 */
	class ProdutoComposto extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProdutoProdutoComposto
 *
 * @property int $id
 * @property int $quantidade
 * @property int $produto_id
 * @property int $produto_composto_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Produto $produto
 * @property-read \App\Models\ProdutoComposto $produtoComposto
 * @method static \Database\Factories\ProdutoProdutoCompostoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoProdutoComposto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoProdutoComposto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoProdutoComposto query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoProdutoComposto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoProdutoComposto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoProdutoComposto whereProdutoCompostoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoProdutoComposto whereProdutoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoProdutoComposto whereQuantidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProdutoProdutoComposto whereUpdatedAt($value)
 */
	class ProdutoProdutoComposto extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Requisicao
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ListagemProdutos> $listagemProdutos
 * @property-read int|null $listagem_produtos_count
 * @method static \Database\Factories\RequisicaoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Requisicao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Requisicao newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Requisicao query()
 */
	class Requisicao extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class User extends \Eloquent {}
}

