<?php

namespace App\Http\Controllers;

use App\Models\ListagemProdutos;
use App\Models\Requisicao;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequisicaoRequest;
use App\Http\Requests\UpdateRequisicaoRequest;
use App\Models\Produto;
use function Webmozart\Assert\Tests\StaticAnalysis\length;
use App\Models\ProdutoComposto;
use App\http\Controllers\ListagemProdutosController;
use Illuminate\Support\Facades\DB;

class RequisicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = Requisicao::all();
        $requisicoes = [];
        foreach ($requests as $request) {
            if ($request->funcionario == null) {
                $request->funcionario = "Não definido";
            }
            if ($request->status == null) {
                $request->status = "Pendente";
            } else if ($request->status == 0) {
                $request->status = "Recusando";
            } else if ($request->status == 1) {
                $request->status = "Concluído";
            }
        }
//        dd($request);
        return view('pages.request.index')->with('requests', $requests);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::all();
        $produtosCompostos = ProdutoComposto::all();
        return view('pages.request.create')->with('produtos', $produtos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequisicaoRequest $request)
    {
        Requisicao::create();
        $id = Requisicao::all()->last()->id;
        for ($i = 1; $i < count($request->all()) - 1; $i++) {
            try {
                if ($request->all()['quantidade' . $i] != 0) {
                    ListagemProdutosController::adicionarProduto($id, $request->all()['produto' . $i], $request->all()['quantidade' . $i]);
                }
            } catch (\Exception $e) {

            }
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $request = Requisicao::find($id);
        $total = DB::select('SELECT SUM(p.precoVenda * lp.quantidade) AS valor_total_venda FROM listagem_produtos lp JOIN produtos p ON lp.produto_id = p.id LEFT JOIN produto_composto pc ON lp.produto_composto_id = pc.id WHERE lp.requisicao_id = ?', [$id]);
        $funcionarios = DB::select('SELECT * FROM funcionarios');
        return view('pages.request.show')->with('request', $request)->with('total', $total[0]->valor_total_venda)->with('funcionarios', $funcionarios);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Requisicao $requisicao, $id)
    {
        return "Essa página não deu, tem o código, mas por algum motivo não funciona: resources/views/pages/request/edit.blade.php";
        $requisicao = Requisicao::find($id);
        $workers = DB::select('SELECT * FROM funcionarios');
        return view('pages.request.edit')->with('request', $requisicao)->with('workers', $workers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequisicaoRequest $request, Requisicao $requisicao, $status)
    {
        $requisicao->status = $status;
        $requisicao->funcionario = $request->funcionario;
        $requisicao->save();
        $requisicao = Requisicao::find($requisicao->id);
        return redirect()->route('request.show', $requisicao->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $requisicao = Requisicao::find($id);
        $requisicao->delete();
        return redirect()->route('request.index');
    }

    static public function getProdutosRequest($id)
    {
        $produtos = ListagemProdutos::where('requisicao_id', $id)->get();
        foreach ($produtos as $produto) {
            $produto->produto = Produto::find($produto->produto_id);
            $produto->produtoComposto = ProdutoComposto::find($produto->produto_composto_id);
        }
        return $produtos;
    }

    static public function executeRequest($id, $status)
    {
        $produtos = self::getProdutosRequest($id);
        $requisicao = Requisicao::find($id);
        if ($status) {
            foreach ($produtos as $produto) {
                if ($produto->produto != null) {
                    $produto->produto->quantidade -= $produto->quantidade;
                    $produto->produto->save();
                } else if ($produto->produtoComposto != null) {
                    $produtosCompostos = ListagemProdutos::where('produto_composto_id', $produto->produtoComposto->id)->get();
                    foreach ($produtosCompostos as $produtoComposto) {
                        $produtoComposto->produto->quantidade -= $produtoComposto->quantidade * $produto->quantidade;
                        $produtoComposto->produto->save();
                    }
                }
            }
            $response = self::update($requisicao, $status);
        } else {
            $response = self::update($requisicao, $status);
        }
        return $response;
    }

    static function indexReport()
    {
        return view('pages.request.report.index');
    }

    static public function getRelatorio($type, $dataInicial, $dataFinal)
    {
        if ($type == '3') {

            $results = DB::select("SELECT produtos.nome AS nome_produto, listagem_produtos.quantidade, listagem_produtos.quantidade * produtos.precoCusto AS precoCusto_total, listagem_produtos.quantidade * produtos.precoVenda AS precoVenda_total, requisicaos.id AS requisicao_id FROM listagem_produtos INNER JOIN requisicaos ON listagem_produtos.requisicao_id = requisicaos.id AND requisicaos.status = TRUE INNER JOIN produtos ON listagem_produtos.produto_id = produtos.id WHERE listagem_produtos.produto_composto_id IS NULL AND requisicaos.created_at >= ? AND requisicaos.created_at <= ? UNION ALL SELECT produtos.nome AS nome_produto, listagem_produtos.quantidade * produto_produto_compostos.quantidade AS quantidade, listagem_produtos.quantidade * produto_produto_compostos.quantidade * produtos.precoCusto AS precoCusto_total,listagem_produtos.quantidade * produto_produto_compostos.quantidade * produtos.precoVenda AS precoVenda_total, requisicaos.id AS requisicao_id FROM listagem_produtos INNER JOIN requisicaos ON listagem_produtos.requisicao_id = requisicaos.id AND requisicaos.status = TRUE INNER JOIN produto_composto ON listagem_produtos.produto_composto_id = produto_composto.id INNER JOIN produto_produto_compostos ON produto_composto.id = produto_produto_compostos.produto_composto_id INNER JOIN produtos ON produto_produto_compostos.produto_composto_id = produtos.id WHERE requisicaos.created_at >= ? AND requisicaos.created_at <= ?", [$dataInicial, $dataFinal, $dataInicial, $dataFinal]);
//            $results = DB::select("SELECT produtos.nome AS nome_produto, listagem_produtos.quantidade, listagem_produtos.quantidade * produtos.precoCusto AS precoCusto_total, listagem_produtos.quantidade * produtos.precoVenda AS precoVenda_total, requisicaos.id AS requisicao_id FROM listagem_produtos INNER JOIN requisicaos ON listagem_produtos.requisicao_id = requisicaos.id AND requisicaos.status = TRUE INNER JOIN produtos ON listagem_produtos.produto_id = produtos.id WHERE listagem_produtos.produto_composto_id IS NULL UNION ALL SELECT produtos.nome AS nome_produto, listagem_produtos.quantidade * produto_produto_compostos.quantidade AS quantidade, listagem_produtos.quantidade * produto_produto_compostos.quantidade * produtos.precoCusto AS precoCusto_total, listagem_produtos.quantidade * produto_produto_compostos.quantidade * produtos.precoVenda AS precoVenda_total, requisicaos.id AS requisicao_id FROM listagem_produtos INNER JOIN requisicaos ON listagem_produtos.requisicao_id = requisicaos.id AND requisicaos.status = TRUE INNER JOIN produto_composto ON listagem_produtos.produto_composto_id = produto_composto.id INNER JOIN produto_produto_compostos ON produto_composto.id = produto_produto_compostos.produto_composto_id INNER JOIN produtos ON produto_produto_compostos.produto_id = produtos.id ");
        }
        else if ($type == '2') {
            $results = DB::select("SELECT requisicaos.id AS requisicao_id, requisicaos.created_at AS data_criacao, requisicaos.updated_at AS data_atualizacao, CASE WHEN requisicaos.status THEN 'Aprovado' ELSE 'Recusado' END AS status, funcionarios.nome AS nome_funcionario FROM requisicaos INNER JOIN funcionarios ON requisicaos.funcionario_id = funcionarios.id WHERE requisicaos.created_at >= ? AND requisicaos.created_at <= ?", [$dataInicial, $dataFinal]);
        }else{
            $results = DB::select("SELECT produtos.nome AS nome_produto, SUM(lotes.quantidadeRecebida) AS quantidade_entrada, SUM(lotes.quantidadeRecebida* produtos.precoCusto) AS precoCusto_total, SUM(lotes.quantidadeRecebida* produtos.precoVenda) AS precoVenda_total FROM lotes INNER JOIN produtos ON lotes.produto_id = produtos.id WHERE lotes.created_at >= ? AND lotes.created_at <= ? GROUP BY produtos.nome UNION all SELECT produto_composto.nome AS nome_produto, SUM(lotes.quantidadeRecebida) AS quantidade_entrada, SUM(lotes.quantidadeRecebida* produto_composto.precoCusto) AS precoCusto_total, SUM(lotes.quantidadeRecebida* produto_composto.precoVenda) AS precoVenda_total FROM lotes INNER JOIN produto_composto ON lotes.produto_composto_id = produto_composto.id WHERE lotes.created_at >= ? AND lotes.created_at <= ? GROUP BY produto_composto.nome", [$dataInicial, $dataFinal, $dataInicial, $dataFinal]);
        }
        return $results;
    }
}
