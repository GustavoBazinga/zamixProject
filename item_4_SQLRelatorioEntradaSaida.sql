SELECT
    produtos.nome AS nome_produto,
    SUM(lotes.quantidadeRecebida) AS quantidade_entrada,
    SUM(lotes.quantidadeRecebida* produtos.precoCusto) AS precoCusto_total,
    SUM(lotes.quantidadeRecebida* produtos.precoVenda) AS precoVenda_total
FROM lotes
    INNER JOIN produtos ON lotes.produto_id = produtos.id
WHERE lotes.created_at >= '2022-01-01' AND lotes.created_at <= '2022-12-31'
GROUP BY produtos.nome

UNION all

SELECT produto_composto.nome AS nome_produto,
       SUM(lotes.quantidadeRecebida) AS quantidade_entrada,
       SUM(lotes.quantidadeRecebida* produto_composto.precoCusto) AS precoCusto_total,
       SUM(lotes.quantidadeRecebida* produto_composto.precoVenda) AS precoVenda_total
FROM lotes
    INNER JOIN produto_composto ON lotes.produto_composto_id = produto_composto.id
WHERE lotes.created_at >= '2022-01-01' AND lotes.created_at <= '2022-12-31'
GROUP BY produto_composto.nome;


-- Saida de estoque
SELECT
    produtos.nome AS nome_produto,
    listagem_produtos.quantidade,
    listagem_produtos.quantidade * produtos.precoCusto AS precoCusto_total,
    listagem_produtos.quantidade * produtos.precoVenda AS precoVenda_total,
    requisicaos.id AS requisicao_id
FROM listagem_produtos
         INNER JOIN requisicaos ON listagem_produtos.requisicao_id = requisicaos.id AND requisicaos.status = TRUE
         INNER JOIN produtos ON listagem_produtos.produto_id = produtos.id
WHERE listagem_produtos.produto_composto_id IS NULL AND requisicaos.created_at >= '2022-01-01' AND requisicaos.created_at <= '2022-12-31'

UNION ALL

SELECT
    produtos.nome AS nome_produto,
    listagem_produtos.quantidade * produto_produto_compostos.quantidade AS quantidade,
    listagem_produtos.quantidade * produto_produto_compostos.quantidade * produtos.precoCusto AS precoCusto_total,
    listagem_produtos.quantidade * produto_produto_compostos.quantidade * produtos.precoVenda AS precoVenda_total,
    requisicaos.id AS requisicao_id
FROM listagem_produtos
         INNER JOIN requisicaos ON listagem_produtos.requisicao_id = requisicaos.id AND requisicaos.status = TRUE
         INNER JOIN produto_composto ON listagem_produtos.produto_composto_id = produto_composto.id
         INNER JOIN produto_produto_compostos ON produto_composto.id = produto_produto_compostos.produto_composto_id
         INNER JOIN produtos ON produto_produto_compostos.produto_composto_id = produtos.id
WHERE requisicaos.created_at >= '2022-01-01' AND requisicaos.created_at <= '2022-12-31'
