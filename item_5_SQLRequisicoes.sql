SELECT requisicaos.id AS requisicao_id,
       requisicaos.created_at AS data_criacao,
       requisicaos.updated_at AS data_atualizacao,
       CASE
           WHEN requisicaos.status THEN 'Aprovado'
           ELSE 'Recusado'
       END AS status,
       funcionarios.nome AS nome_funcionario
FROM requisicaos
INNER JOIN funcionarios ON requisicaos.funcionario_id = funcionarios.id
WHERE requisicaos.created_at >= '2022-01-01' AND requisicaos.created_at <= '2022-12-31'
